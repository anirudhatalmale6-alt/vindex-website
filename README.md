# Vindex — public website

Bilingual (English / Danish) public site: Landing, Cases, About, Platform, Contact.
Dark by default with a light-mode toggle.

## How the text works

The pages are PHP templates (`index.php`, `about.php`, …). Every heading,
paragraph, button and menu item is fetched by key from `inc/sitetext.php`:

- **Original wording** lives in `inc/sitetext-defaults.php` (202 pieces of text).
- **Edits** are made in the members admin under **Website text** and stored in
  the `site_text` table. Only real changes are stored; saving the original
  wording, emptying a box, or pressing **Reset** removes the edit.
- If the database is unreachable, pages still render with the original wording
  and the failure is logged — the public site never goes blank.

Text uses a small, safe markup rather than HTML — `**bold**`, `==cyan highlight==`,
`[link text](https://…)` — and everything else is escaped.

Keys are made from the wording, not the position (`index.the-living-knowledge-base-for-ai`),
so adding an element to a page can never attach a saved edit to the wrong text.

## Layout

```
index.php … contact.php   pages (layout lives here, text does not)
contact-send.php          contact form handler -> emails the address set at install
inc/                      text library + original wording (denied to the web)
assets/                   styles + script
members/                  the members area (separate repo: vindex-members)
.htaccess                 index.php first, old .html links -> .php, inc/ denied
tools/build_sitetext.py   one-time converter used to create the templates (not deployed)
*.html                    the original static pages, kept so the GitHub preview link works
```

## Deploying

Upload the PHP pages, `contact-send.php`, `inc/`, `assets/`, `.htaccess` and the
`members/` folder to the web root, then open `/members/install.php`.
The `.html` files and `tools/` are not needed on the server.
