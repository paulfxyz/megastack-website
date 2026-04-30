# megastack.sh

> **End-to-End Open Source Security Stack**
> Corporate-grade security at startup-friendly pricing — deployed on infrastructure you own.

[![Live](https://img.shields.io/badge/live-megastack.sh-E5000A?style=flat-square)](https://megastack.sh)
[![Languages](https://img.shields.io/badge/languages-25-B2AEA8?style=flat-square)](#internationalisation)
[![License](https://img.shields.io/badge/license-MIT-3A3733?style=flat-square)](LICENSE)

---

## What is megastack.sh?

megastack.sh is a security consultancy that deploys a complete, battle-hardened open-source security stack on servers and devices you control. No black-box SaaS. No vendor lock-in. No trust required — just code you can read and infrastructure you own.

**Live site:** [https://megastack.sh](https://megastack.sh)
**Contact:** [hi@megastack.sh](mailto:hi@megastack.sh)
**Responsible disclosure:** [hi@megastack.sh](mailto:hi@megastack.sh)

---

## The Stack

### Core Layers (deployed on every engagement)

| # | Tool | Layer | Purpose |
|---|------|-------|---------|
| L1 | [WireGuard](https://github.com/WireGuard/wireguard-tools) | VPN Backbone | Encrypted mesh — all other services tunnel through it |
| L2 | [Hoodik](https://github.com/hudikhq/hoodik) | Encrypted File Hosting | E2E encrypted file storage — SSH keys, certs, secrets |
| L3 | Custom nftables/iptables | Hardened Firewall | Deny-all policies — internal services unreachable off-mesh |
| L4 | Notion / Plane templates | Access Management | Key rotation, peer onboarding, incident logs |
| L5 | [Matrix + Element (Synapse)](https://github.com/element-hq/synapse) | Secure Comms | Self-hosted E2E encrypted messaging, zero third-party metadata |
| L6 | [Authelia](https://github.com/authelia/authelia) | 2FA Server | Self-hosted TOTP — your tokens, your hardware keys |
| L7 | Resilio Sync | P2P File Sync | BitTorrent-based sync across devices, no cloud |
| L8 | [topgrade](https://github.com/topgrade-rs/topgrade) | Fleet Updates | One command updates everything — Mac, Windows, Linux |
| L9 | [Wasabi Wallet](https://github.com/WalletWasabi/WalletWasabi) | Bitcoin Reserve | CoinJoin + Tor routing — private Bitcoin infrastructure |

### Extended Toolbox (scoped per engagement)

| Tool | Repo | Category |
|------|------|----------|
| OpenVAS / Greenbone | [greenbone/openvas-scanner](https://github.com/greenbone/openvas-scanner) | Vulnerability Scanning |
| Trivy | [aquasecurity/trivy](https://github.com/aquasecurity/trivy) | Container & Cloud Security |
| Falco | [falcosecurity/falco](https://github.com/falcosecurity/falco) | Runtime Security Monitoring |
| Semgrep | [semgrep/semgrep](https://github.com/semgrep/semgrep) | Static Code Analysis |
| Gitleaks | [gitleaks/gitleaks](https://github.com/gitleaks/gitleaks) | Secret Detection |
| OWASP ZAP | [zaproxy/zaproxy](https://github.com/zaproxy/zaproxy) | Web App Security Testing |
| Nmap | [nmap/nmap](https://github.com/nmap/nmap) | Network Discovery |
| Wazuh | [wazuh/wazuh](https://github.com/wazuh/wazuh) | SIEM / HIDS |
| Snort | [snort3/snort3](https://github.com/snort3/snort3) | Network IDS |
| Suricata | [OISF/suricata](https://github.com/OISF/suricata) | Network IDS |
| ClamAV | [Cisco-Talos/clamav](https://github.com/Cisco-Talos/clamav) | Antivirus |
| Fail2Ban | [fail2ban/fail2ban](https://github.com/fail2ban/fail2ban) | Brute-force Protection |
| Lynis | [CISOfy/lynis](https://github.com/CISOfy/lynis) | System Hardening Audit |
| OSSEC | [ossec/ossec-hids](https://github.com/ossec/ossec-hids) | Host-based IDS |

---

## Repository Structure

```
megastack-website/
├── index.html                          # EN landing page (self-contained HTML/CSS/JS)
├── send-booking.php                    # Server-side Resend API proxy (no CORS)
├── lang/                               # 24 localised pages
│   ├── fr/ de/ es/ it/ pt/             # Western Europe
│   ├── nl/ pl/ sv/ no/ da/ fi/         # Northern/Eastern Europe
│   ├── ru/ uk/                         # Eastern Europe
│   ├── zh/ ja/ ko/ th/ vi/ id/         # Asia-Pacific
│   └── ar/ fa/ he/ hi/ tr/             # Middle East & South Asia
├── assets/
│   ├── logo-2500.png                   # Master logo — 2500×2500
│   ├── github-banner.png               # GitHub banner 1280×640
│   ├── og-image.png                    # Open Graph 1200×630
│   ├── megastack-linkedin-2000x400.*   # LinkedIn banner (PNG + JPEG)
│   ├── megastack-x-twitter-header-*    # X/Twitter header 1500×500
│   ├── favicon.ico                     # Multi-size (16/32/48px)
│   ├── apple-touch-icon.png            # iOS 180×180
│   ├── android-chrome-{192,512}.png    # Android
│   ├── mstile-150x150.png              # Windows tile
│   ├── site.webmanifest                # PWA manifest
│   └── megastack-media-kit-v1.4.0.zip # Full media kit (30 files, 7MB)
└── media-kit/
    ├── logos/                          # Black / white / transparent × 5 sizes
    ├── banners/                        # GitHub banner
    ├── social/                         # OG, Twitter, LinkedIn (PNG + JPEG)
    ├── favicons/                       # Complete favicon suite
    └── BRAND_GUIDELINES.txt            # Colours, typography, usage rules
```

---

## Internationalisation

25 languages — every page at its own clean URL with full SEO (canonical, hreflang, localised title & description). Booking modal UI translated in every language; email notifications always sent in English.

| Code | Language | URL | Direction |
|------|----------|-----|-----------|
| EN | English | `megastack.sh/` | LTR |
| FR | Français | `megastack.sh/fr/` | LTR |
| ES | Español | `megastack.sh/es/` | LTR |
| DE | Deutsch | `megastack.sh/de/` | LTR |
| IT | Italiano | `megastack.sh/it/` | LTR |
| PT | Português | `megastack.sh/pt/` | LTR |
| NL | Nederlands | `megastack.sh/nl/` | LTR |
| PL | Polski | `megastack.sh/pl/` | LTR |
| SV | Svenska | `megastack.sh/sv/` | LTR |
| NO | Norsk | `megastack.sh/no/` | LTR |
| DA | Dansk | `megastack.sh/da/` | LTR |
| FI | Suomi | `megastack.sh/fi/` | LTR |
| RU | Русский | `megastack.sh/ru/` | LTR |
| UK | Українська | `megastack.sh/uk/` | LTR |
| ZH | 中文 | `megastack.sh/zh/` | LTR |
| JA | 日本語 | `megastack.sh/ja/` | LTR |
| KO | 한국어 | `megastack.sh/ko/` | LTR |
| AR | العربية | `megastack.sh/ar/` | **RTL** |
| FA | فارسی | `megastack.sh/fa/` | **RTL** |
| HE | עברית | `megastack.sh/he/` | **RTL** |
| HI | हिन्दी | `megastack.sh/hi/` | LTR |
| TR | Türkçe | `megastack.sh/tr/` | LTR |
| ID | Bahasa ID | `megastack.sh/id/` | LTR |
| VI | Tiếng Việt | `megastack.sh/vi/` | LTR |
| TH | ภาษาไทย | `megastack.sh/th/` | LTR |

---

## Features

### Design & UX
- **Zero-dependency static HTML** — no framework, no build tool, no runtime
- **Dark / light theme** — toggle in nav, preference saved to `localStorage`
- **Language switcher** — globe icon in nav, navigates to localised URL
- **Space Grotesk + Clash Display + JetBrains Mono** — full font stack
- **Pure black surfaces** (`#000000`) with `#E5000A` acid red accent
- **Mobile-first** — 4 responsive breakpoints (420 / 640 / 900 / 1400px)
- **Mobile nav** — hamburger with spring-physics `=` → `×` animation (cubic-bezier overshoot), bars turn `#E5000A` acid red on open; menu panel slides in with fade+translateY; lang + theme switchers live inside the drawer on every language version
- **RTL-aware** — comprehensive CSS overrides for Arabic, Persian, Hebrew

### Animations & Effects
- **Matrix rain canvas** — dual-tone (red left, ice blue right), variable speed
- **Radar sweep** — appears on scroll past hero, animated blips
- **World map canvas** — connection laser beams between 14 city nodes
- **Hero wordmark animation** — MGSTCK → MEGASTACK → MEGASTACK.SH, loops every 6s, replays on hover
- **Omnipresent char flicker** — 1–4 chars swap across all text nodes every 40–110ms
- **Hero glitch** — CSS clip-path animation on wordmark
- **CRT scanlines + film grain** — subtle overlay on body

### Modals & Flows
- **Booking modal** — 3-step: contact → day picker (weekdays, +4 from today) → review → sends email via PHP proxy
- **Commercial VPN modal** — NordVPN / ExpressVPN / PIA reseller flow
- **Download modal** — QR code + store buttons for Windows, macOS, iOS, Android
- **Login modal** — Email or Phone OTP tabs (UI only)
- **Private resource modal** — for Resilio / firewall / access templates (client-only)
- **Language WIP modal** — shown when selecting a future language (currently all 24 are live)

### SEO & Social
- Localised `<title>`, `<meta description>`, OG tags, Twitter Card per language
- `hreflang` alternate links across all 25 versions
- `<link rel="canonical">` on every page
- Full favicon suite — ICO, PNG (16/32/48/180/192/512px), Windows tile, PWA manifest
- `site.webmanifest` for PWA installation

### Easter Eggs
For the curious:
- **Open DevTools** → console greeting with disclosure info
- **↑↑↓↓←→←→BA** → Konami code secret overlay
- **Click anywhere** → red particle burst from cursor
- **Switch tabs** → title changes to `> you_found_us.sh`
- **View source** → box-drawn comment with full team credits
- **Inspect DOM** → hidden `div` with `data-secret` (base64)

---

## Deployment

The site is a zero-dependency static HTML + one PHP file. No build step required.

### Production (SiteGround via FTP)

```python
import ftplib, ssl, os

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

ftp = ftplib.FTP_TLS(context=ctx)
ftp.connect('es7.siteground.eu', 21)
ftp.auth()
ftp.login('ftp@megastack.sh', 'PASSWORD')
ftp.prot_p()
ftp.set_pasv(True)
ftp.cwd('megastack.sh/public_html')

# Upload main page
with open('index.html', 'rb') as f:
    ftp.storbinary('STOR index.html', f, blocksize=65536)

# Upload a language page
ftp.cwd('fr')
with open('lang/fr/index.html', 'rb') as f:
    ftp.storbinary('STOR index.html', f, blocksize=65536)
```

> **Note:** Use Python's `ftplib.FTP_TLS` — plain `curl --ftp-ssl` silently uploads 0 bytes for large files on this host.

### Local Development

```bash
# Any static server works
npx serve .
python3 -m http.server 8080
```

---

## Booking / Lead Flow

Visitors submit the booking form → JS POSTs to `/send-booking.php` → PHP forwards to Resend API.

```
Visitor browser  →  /send-booking.php  →  api.resend.com  →  hello@paulfleury.com
```

- **From:** `lead@megastack.sh`
- **To:** `hello@paulfleury.com`
- **Reply-to:** visitor's email
- **Subject:** `[megastack.sh] New booking — [Name] — [Day]`
- **Body:** HTML template with all fields + timestamp + visitor IP
- **Email language:** Always English regardless of visitor's language

The API key lives server-side in `send-booking.php` only — never exposed to the browser.

---

## Brand

### Colours
| Token | Hex | Use |
|-------|-----|-----|
| Red (Primary) | `#E5000A` | Accent, CTA, highlights |
| Black | `#000000` | Background |
| White | `#F0EDE8` | Body text |
| Ice Blue | `#00C8FF` | Data / encryption accent |
| Gold | `#F5A623` | Bitcoin layer |

### Typography
| Role | Font | Source |
|------|------|--------|
| Display / Headlines | Clash Display 500–700 | [Fontshare](https://api.fontshare.com) |
| Body / UI | Space Grotesk 300–700 | Google Fonts |
| Code / Labels | JetBrains Mono 400–700 | Google Fonts |

### Media Kit
Download at [megastack.sh/assets/megastack-media-kit-v1.4.0.zip](https://megastack.sh/assets/megastack-media-kit-v1.4.0.zip)

Contains: logos (black/white/transparent × 5 sizes), GitHub banner, OG image, Twitter header, LinkedIn banner, complete favicon suite, brand guidelines.

---

## Team

| Role | Name | Handle | Link |
|------|------|--------|------|
| Founder & CEO | Paul Fleury | [paulfxyz](https://github.com/paulfxyz) | [LinkedIn](https://linkedin.com/in/paulfxyz/) |
| Project Manager | Bo\*\*\* M\*\*\*\*\*ov *(redacted)* | b0ian | — |
| Project Manager | Cl\*\*\*\*\*\* D\*\*\*\*\*go *(redacted)* | SaxX | — |
| Project Manager | S\*\*\*\*\* Ra\*\*\*\*t *(redacted)* | ShinyHunters | — |
| Project Manager | R\*\*\*i Ca\*\*\*a *(redacted)* | Lupin | — |
| Project Manager | Al\*\*\*\*\*\* Tr\*\*\*\*\*lt *(redacted)* | MrJack | [X](https://x.com/FrenchKey_fr) |
| Project Manager | S\*\*\*\*\*\* H\*\*\*i *(redacted)* | navlys__ | [X](https://x.com/navlys__) |

Plus a worldwide collective of ~12 vetted sysops and security researchers for on-site and remote deployments.

All engagements covered by NDA. All communications over the megastack.sh stack itself.

---

## Versioning

| Version | Date | Changes |
|---------|------|---------|
| `v1.0.0` | 2026-04-26 | Initial launch — full landing page, 9-layer stack, booking modal |
| `v1.1.0` | 2026-04-26 | Wasabi Wallet layer (L9) |
| `v1.2.0` | 2026-04-26 | Extended toolbox, team hierarchy, package section, booking email |
| `v1.3.0` | 2026-04-26 | Media kit (30 assets), GitHub banner, favicon suite, OG meta |
| `v1.4.0` | 2026-04-26 | Roni Carta + Boian bios, 4 hackers, dark/light theme, lang modal |
| `v1.5.0` | 2026-04-27 | Full i18n — 25 languages, RTL (AR/FA/HE), booking modal translated |
| `v1.6.0` | 2026-04-27 | Logo fix on lang pages, hacker easter eggs, complete translation pass |
| `v1.6.1` | 2026-04-27 | Remove all proxy.sh references; Konami quote → Alan Turing |
| `v1.6.2` | 2026-04-27 | Fix EN redirect from all 24 lang pages |
| `v1.6.3` | 2026-04-27 | Fix xtool-grid mobile overflow (inline style → CSS class) |
| `v1.6.4` | 2026-04-27 | Advisors, package split, media kit — stack to 1 col on mobile |
| `v1.6.5` | 2026-04-27 | Translate missing team bios, tags, collective + training blocks (24 lang) |
| `v1.6.6` | 2026-04-27 | Fix bio injection — Unicode curly apostrophe mismatch |
| `v1.6.7` | 2026-04-28 | Mobile nav — lang + theme switchers injected into drawer on all lang pages |
| `v1.6.8` | 2026-04-28 | Burger spring animation (overshoot cubic-bezier, acid red X, staggered bars), menu slide-in panel |
| `v1.6.9` | 2026-04-30 | Privacy: redact advisor full names, remove all handle links (25 pages) |
| `v1.7.0` | 2026-04-30 | Fix paulfxyz handle → github.com/paulfxyz on all 25 pages |

---

## License

All **source code** (HTML, CSS, JS, PHP) in this repository is © 2026 megastack.sh. All rights reserved.
All referenced **open-source tools** remain under their respective licenses.

---

*One founder. Four hackers. Multiple shades of grey.*
