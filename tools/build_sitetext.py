#!/usr/bin/env python3
"""
One-shot converter: the static *.html pages -> PHP templates whose text is
editable from the members admin ("Website text").

    python3 tools/build_sitetext.py

Writes <page>.php for each page and inc/sitetext-defaults.php (the original
wording, used whenever no edit has been saved). The .html files are left alone
— they remain the static GitHub preview.

KEYS ARE BUILT FROM THE WORDING, NOT THE POSITION. An edit is stored against a
key; if keys were "the 17th string on the page", adding one element above it
would silently attach every later edit to the wrong text. A key such as
index.the-living-knowledge-base-for survives anything added around it.

After this has run once, the .php templates are the source of truth for page
structure. Do not re-run it over a live site without checking the key diff:
a changed default wording produces a NEW key, and the old edit would be
orphaned (shown nowhere, harmless, but lost to the editor).
"""
import html, json, os, re, sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
PAGES = ["index", "cases", "about", "platform", "contact"]
PAGE_NAMES = {"index": "Landing page", "cases": "Cases", "about": "About",
              "platform": "Platform", "contact": "Contact", "shared": "Menu & footer (every page)"}
VOID = {"area", "base", "br", "col", "embed", "hr", "img", "input", "link", "meta",
        "source", "track", "wbr"}
SHARED_CONTEXT = {"header", "footer", "nav"}

ATTR = r'''(?:\s+[^\s=>/"']+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s"'=<>`]+))?)'''
TAG = re.compile(r"<!--.*?-->|<(/?)([a-zA-Z][a-zA-Z0-9]*)(" + ATTR + r"*)\s*(/?)>", re.S)
ATTR_ONE = re.compile(r'''([^\s=>/"']+)(?:\s*=\s*("[^"]*"|'[^']*'|[^\s"'=<>`]+))?''')


def attrs_of(s):
    out = {}
    for m in ATTR_ONE.finditer(s):
        v = m.group(2)
        if v is None:
            out[m.group(1)] = None
        else:
            if v[:1] in "\"'":
                v = v[1:-1]
            out[m.group(1)] = html.unescape(v)
    return out


def to_markup(h):
    """Original inline HTML -> the editor's simple markup."""
    s = h
    s = re.sub(r"<b>(.*?)</b>", r"**\1**", s, flags=re.S)
    s = re.sub(r"<strong>(.*?)</strong>", r"**\1**", s, flags=re.S)
    s = re.sub(r"""<span\s+class=["']grad["']\s*>(.*?)</span>""", r"==\1==", s, flags=re.S)
    s = re.sub(r"""<a\s+href=["']([^"']*)["']\s*>(.*?)</a>""", r"[\2](\1)", s, flags=re.S)
    if re.search(r"<[a-zA-Z/]", s):
        raise SystemExit(f"unhandled inline HTML, refusing to guess: {h!r}")
    return html.unescape(s)


def slug(text, n=6):
    t = re.sub(r"\*\*|==|\[|\]\([^)]*\)", " ", text)
    t = (t.lower().replace("æ", "ae").replace("ø", "oe").replace("å", "aa"))
    words = re.findall(r"[a-z0-9]+", t)
    return "-".join(words[:n]) or "text"


def label_for(tag, cls, parent="", ctx=()):
    c, par = cls or "", parent or ""
    tags = [t for t, _ in ctx]
    # Where the text sits, said the way the client sees it on the page.
    if "form-ok" in c: return "Message shown after the contact form is sent"
    if "domains" in c: return "Footer copyright line"
    if "lbl" in c: return "Small label above the logo row"
    if "tag" in c.split() and "media" in par: return "Small tag on a case card"
    if "meta" in c.split(): return "Small detail line on a case card"
    if "lock" in c.split(): return "Access label in the fold-out demo (All / Leadership)"
    if "l" in c.split() and "n" in par.split(): return "Label under a big number"
    if "sub" in c.split(): return "Detail line inside the fold-out demo"
    if "inner" in c.split() or "inner" in par.split(): return "Text inside the fold-out demo"
    if "acc-head" in par.split() or "idx" in par.split(): return "Fold-out title in the demo"
    if "pill" in par.split() or "live" in par.split(): return "Small badge above the headline"
    if c.split() == ["l"]: return "Label under a big number"
    if tag == "b" and "li" in tags[-2:]: return "Bold start of a point in a list"
    if tag == "span" and not c and "li" in tags[-2:]: return "Rest of a point in a list (after the bold part)"
    if tag == "span" and not c and "footer" in tags: return "Small line in the footer"
    if "breadcrumb" in par.split(): return "Breadcrumb (small 'Home / page' line at the top)"
    if "tier" in par.split(): return "Access tier description"
    if tag == "h1": return "Main headline"
    if tag == "h2": return "Section heading"
    if tag in ("h3", "h4"): return "Card / sub heading"
    if "eyebrow" in c: return "Small label above a heading"
    if tag == "a" and "btn" in c: return "Button"
    if tag == "button": return "Button"
    if tag == "a": return "Link"
    if tag == "label": return "Form field label"
    if tag == "option": return "Dropdown choice"
    if tag == "p": return "Paragraph"
    if tag == "b": return "Bold text"
    return "Small text line"


def php_str(s):
    return "'" + s.replace("\\", "\\\\").replace("'", "\\'") + "'"


def convert(page, defaults, shared_seen):
    src = open(os.path.join(ROOT, page + ".html"), encoding="utf-8").read()
    toks = list(TAG.finditer(src))
    edits = []                 # (start, end, replacement)
    used = set(k for k in defaults if k.startswith(page + "."))
    ctx = []                   # stack of (tag, class) of open elements: header/footer/nav context + parent
    group = PAGE_NAMES[page]
    order = 0
    skip_until = None

    def new_key(prefix, text):
        base = f"{prefix}.{slug(text)}"
        k, i = base, 2
        while k in defaults or k in used:
            k = f"{base}-{i}"; i += 1
        used.add(k)
        return k

    i = 0
    while i < len(toks):
        t = toks[i]
        if t.group(0).startswith("<!--"):
            i += 1; continue
        closing, name, rawattrs, selfclose = t.group(1), t.group(2).lower(), t.group(3), t.group(4)
        if skip_until:
            if closing and name == skip_until:
                skip_until = None
            i += 1; continue
        if not closing and name in ("script", "style"):
            skip_until = name; i += 1; continue
        if closing:
            names = [c[0] for c in ctx]
            if ctx and ctx[-1][0] == name: ctx.pop()
            elif name in names:
                while ctx and ctx.pop()[0] != name: pass
            i += 1; continue
        a = attrs_of(rawattrs)
        in_shared = any(c[0] in SHARED_CONTEXT for c in ctx)
        parent_cls = ctx[-1][1] if ctx else ""

        # placeholders on inputs / textareas
        if "data-en-ph" in a:
            order += 1
            en, da = a["data-en-ph"], a.get("data-da-ph") or a["data-en-ph"]
            k = new_key(page, "hint " + en)
            defaults[k] = dict(page=page, group=group, label="Hint shown inside an empty field",
                               kind="plain", en=en, da=da, order=order)
            tag_src = t.group(0)
            new = tag_src
            new = re.sub(r'''\sdata-en-ph=(".*?"|'.*?')''', f' data-en-ph="<?= st_plain({php_str(k)}, \'en\') ?>"', new, count=1)
            new = re.sub(r'''\sdata-da-ph=(".*?"|'.*?')''', f' data-da-ph="<?= st_plain({php_str(k)}, \'da\') ?>"', new, count=1)
            new = re.sub(r'''\splaceholder=(".*?"|'.*?')''', f' placeholder="<?= st_plain({php_str(k)}, \'en\') ?>"', new, count=1)
            edits.append((t.start(), t.end(), new))

        if "data-en" in a and name not in VOID and not selfclose:
            # find the matching close tag
            depth, j = 1, i + 1
            while j < len(toks):
                u = toks[j]
                if not u.group(0).startswith("<!--") and u.group(2) and u.group(2).lower() == name and not u.group(4):
                    depth += -1 if u.group(1) else 1
                    if depth == 0: break
                j += 1
            if j >= len(toks):
                raise SystemExit(f"{page}: no closing </{name}> for {t.group(0)[:80]}")
            inner = src[t.end():toks[j].start()]
            en_html, da_html = a["data-en"], a.get("data-da")
            if da_html is None:
                raise SystemExit(f"{page}: data-en without data-da: {t.group(0)[:80]}")
            if html.unescape(re.sub(r"\s+", " ", inner)).replace('"', "'").strip() != \
               re.sub(r"\s+", " ", en_html).replace('"', "'").strip():
                raise SystemExit(f"{page}: visible text differs from data-en, refusing:\n  {inner!r}\n  {en_html!r}")
            en, da = to_markup(en_html), to_markup(da_html)
            order += 1
            if in_shared:
                sig = (en, da)
                if sig in shared_seen:
                    k = shared_seen[sig]
                else:
                    k = new_key("shared", en)
                    shared_seen[sig] = k
                    defaults[k] = dict(page="shared", group="Menu & footer", label=label_for(name, a.get("class"), parent_cls, tuple(ctx)),
                                       kind="text", en=en, da=da, order=len(shared_seen))
            else:
                k = new_key(page, en)
                if name in ("h1", "h2"):
                    group = re.sub(r"\*\*|==|\[([^\]]*)\]\([^)]*\)", r"\1", en)[:70]
                defaults[k] = dict(page=page, group=group, label=label_for(name, a.get("class"), parent_cls, tuple(ctx)),
                                   kind="text", en=en, da=da, order=order)
            open_src = t.group(0)
            open_new = re.sub(r'''\sdata-en=(".*?"|'.*?')''', f' data-en="<?= st_attr({php_str(k)}, \'en\') ?>"', open_src, count=1, flags=re.S)
            open_new = re.sub(r'''\sdata-da=(".*?"|'.*?')''', f' data-da="<?= st_attr({php_str(k)}, \'da\') ?>"', open_new, count=1, flags=re.S)
            edits.append((t.start(), t.end(), open_new))
            edits.append((t.end(), toks[j].start(), f"<?= st_html({php_str(k)}, 'en') ?>"))
            # skip tokens inside this element
            i = j + 1
            continue

        if not selfclose and name not in VOID:
            ctx.append((name, a.get("class") or ""))
        i += 1

    out, pos = [], 0
    for s, e, r in sorted(edits):
        if s < pos: raise SystemExit(f"{page}: overlapping edits at {s}")
        out.append(src[pos:s]); out.append(r); pos = e
    out.append(src[pos:])
    body = "".join(out)

    # <title> and meta description: what search engines and browser tabs show
    tm = re.search(r"<title>(.*?)</title>", body, re.S)
    k = f"{page}._title"
    defaults[k] = dict(page=page, group="Search engines & browser tab", label="Page title (browser tab and Google)",
                       kind="seo", en=html.unescape(tm.group(1).strip()), da="", order=-2)
    body = body[:tm.start()] + f"<title><?= st_plain('{k}', 'en') ?></title>" + body[tm.end():]
    mm = re.search(r'''<meta\s+name=["']description["']\s+content=(".*?"|'.*?')\s*/?>''', body, re.S)
    if mm:
        k = f"{page}._meta"
        defaults[k] = dict(page=page, group="Search engines & browser tab", label="Description shown under the title in Google",
                           kind="seo", en=html.unescape(mm.group(1)[1:-1]), da="", order=-1)
        body = body[:mm.start()] + f'<meta name="description" content="<?= st_plain(\'{k}\', \'en\') ?>">' + body[mm.end():]

    # internal links now point at the PHP pages
    body = re.sub(r'href="(index|cases|about|platform|contact)\.html(#[^"]*)?"', r'href="\1.php\2"', body)
    body = body.replace('action="contact.php"', 'action="contact-send.php"')

    head = ("<?php\n// Generated from " + page + ".html by tools/build_sitetext.py.\n"
            "// Wording comes from inc/sitetext-defaults.php plus any edits made in\n"
            "// the members admin under \"Website text\". Edit layout here, text there.\n"
            "require __DIR__ . '/inc/sitetext.php';\nst_page('" + page + "');\n?>")
    target = os.path.join(ROOT, page + ".php")
    # Never overwrite a file this tool did not write. contact.php used to be
    # the form handler; the first run of this script replaced it with the page.
    if os.path.exists(target):
        first = open(target, encoding="utf-8").read(200)
        if "Generated from " + page + ".html by tools/build_sitetext.py" not in first:
            raise SystemExit(f"refusing to overwrite {page}.php — it exists and was not generated by this tool")
    open(target, "w", encoding="utf-8").write(head + body)


def main():
    defaults, shared = {}, {}
    for p in PAGES:
        convert(p, defaults, shared)
    os.makedirs(os.path.join(ROOT, "inc"), exist_ok=True)
    lines = ["<?php", "// Generated by tools/build_sitetext.py — the ORIGINAL wording of every",
             "// editable piece of public-site text. Edits saved in the admin override these;",
             "// \"Reset\" in the admin returns a field to the value here.",
             "return ["]
    for k in sorted(defaults, key=lambda k: (PAGES.index(defaults[k]["page"]) if defaults[k]["page"] in PAGES else 99,
                                             defaults[k]["order"])):
        d = defaults[k]
        lines.append(f"  {php_str(k)} => [" + ", ".join(f"{php_str(f)} => {php_str(str(d[f])) if f != 'order' else d[f]}"
                                                for f in ("page", "group", "label", "kind", "en", "da", "order")) + "],")
    lines.append("];")
    open(os.path.join(ROOT, "inc", "sitetext-defaults.php"), "w", encoding="utf-8").write("\n".join(lines) + "\n")
    by = {}
    for d in defaults.values(): by[d["page"]] = by.get(d["page"], 0) + 1
    print("keys:", len(defaults), by)


main()
