#!/usr/bin/env python3
"""
Build a one-file, self-applying updater for a one.com-style host where the
client can only use File Manager.

    python3 tools/build_updater.py <website_repo> <members_repo> <out.php> [--only PREFIX]... [--skip PREFIX]...

--only / --skip split a big update into parts (one.com chokes on an ~8 MB
updater; ~4 MB is known to work): e.g. one part with --skip assets/video/ and
a second with --only assets/video/about.

Why a PHP file instead of a zip: File Manager extracts a zip into a NEW folder
named after the zip, so a "replace these files" upload lands next to the site
instead of over it. A single PHP file is uploaded to the main folder and does
the placing itself, in the right spot, every time.
"""
import base64, hashlib, os, secrets, subprocess, sys, io, tarfile

web, mem, out = sys.argv[1:4]
only, skip = [], []
rest = sys.argv[4:]
while rest:
    flag, val, rest = rest[0], rest[1], rest[2:]
    (only if flag == "--only" else skip if flag == "--skip" else sys.exit("unknown flag " + flag)).append(val)

def tracked(repo):
    data = subprocess.run(["git", "-C", repo, "archive", "HEAD"], capture_output=True, check=True).stdout
    files = {}
    with tarfile.open(fileobj=io.BytesIO(data)) as t:
        for m in t.getmembers():
            if m.isfile():
                files[m.name] = t.extractfile(m).read()
    return files

payload = {}
for path, data in tracked(web).items():
    if path.endswith(".html") or path.startswith("tools/") or path in ("README.md", ".gitignore"):
        continue
    payload[path] = data
for path, data in tracked(mem).items():
    if path in ("seed.php", "README.md", ".gitignore") or path.startswith("private/"):
        continue          # private/ holds the live secrets and lock — never shipped, never touched
    payload["members/" + path] = data

if only: payload = {p: d for p, d in payload.items() if any(p.startswith(o) for o in only)}
if skip: payload = {p: d for p, d in payload.items() if not any(p.startswith(k) for k in skip)}
if not payload: sys.exit("nothing left to ship")

token = secrets.token_hex(16)
lines = []
for p in sorted(payload):
    b = base64.b64encode(payload[p]).decode()
    lines.append(f"  '{p}' => '{b}',")
version = subprocess.run(["git", "-C", web, "rev-parse", "--short", "HEAD"], capture_output=True, text=True).stdout.strip() \
        + "+" + subprocess.run(["git", "-C", mem, "rev-parse", "--short", "HEAD"], capture_output=True, text=True).stdout.strip()

php = open(os.path.join(os.path.dirname(__file__), "updater_template.php"), encoding="utf-8").read()
php = php.replace("%%TOKEN%%", token).replace("%%VERSION%%", version).replace("%%PAYLOAD%%", "\n".join(lines))
open(out, "w", encoding="utf-8").write(php)
print(f"wrote {out}: {len(payload)} files, {os.path.getsize(out)//1024} KB, version {version}")
