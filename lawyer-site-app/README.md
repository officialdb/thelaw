# Nnamdi Igwebuike Nwagwu - Chambers Website (Laravel)

This is the runnable Laravel app for the chambers website. It uses plain
CSS in the layout, so there is no separate frontend build step required.

## 1. Run locally

```bash
cd lawyer-site-app
php artisan serve
```

If you are starting from a fresh clone, run `composer install` first.

## 2. Set environment variables

Add to `.env`:

```
SITE_OWNER_NAME="Nnamdi Igwebuike Nwagwu, Esq."
SITE_OWNER_ROLE="Barrister & Solicitor"
SITE_PHONE_DISPLAY="+234 707 015 7195"
SITE_WHATSAPP_NUMBER=2347070157195
SITE_EMAIL=chambers@nnamdinwagwu.com
SITE_ADDRESS="By appointment - Nigeria"

MAIL_MAILER=smtp
MAIL_SCHEME=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_FROM_ADDRESS=chambers@nnamdinwagwu.com
MAIL_FROM_NAME="${SITE_OWNER_NAME}"
```

If your SMTP provider requires implicit TLS on port 465, change
`MAIL_SCHEME=smtps` and `MAIL_PORT=465`. Most shared hosts provide an SMTP
relay, or you can use a service like Zoho Mail, SendGrid, Mailgun, or a
domain mailbox from your host.

Visit http://localhost:8000 and check all four pages plus the contact form.

## 3. Content still needed before this goes live

Marked with `[bracketed placeholders]` or `TODO` comments in the code:

- **`app/Http/Controllers/PageController.php`** - the `$practiceAreas` array
  is a placeholder list (Corporate/Commercial, Litigation, Property, Family,
  Criminal). Confirm which of these he actually practices and edit the
  titles/summaries.
- **`resources/views/pages/about.blade.php`** - year called to the Bar,
  law school, prior chambers/firms, and a real bio paragraph in his voice.
- **`SITE_EMAIL`** in `.env` - currently a placeholder inbox.
- Physical address, if he has a walk-in office (currently "By appointment").

## 4. Deploy to shared hosting

1. Run `composer install --no-dev --optimize-autoloader` locally, or on the
   host if it has SSH + Composer access.
2. Upload the whole project, but point the domain's **document root at the
   `public/` folder** - not the project root. Most cPanel hosts let you set
   this per-domain; if not, some hosts require moving `public/`'s contents
   up a level and adjusting the `index.php` paths (ask your host's support
   for their standard Laravel setup, it's a common request).
3. Set the same `.env` values as above in the host's environment or via an
   uploaded `.env` file (never commit `.env` to a public repo).
4. Run `php artisan migrate` if you later add a database-backed feature
   (not needed for this version - no DB is used yet).
5. Run `php artisan config:cache && php artisan route:cache` for
   production performance.

## 5. FTP Hosting Layout

If your host gives you FTP access and two sibling folders under
`/home/ogechih1`, use this layout:

```text
/home/ogechih1/lawyer-site-app
/home/ogechih1/nnamdinwagwu.com
```

Upload the Laravel application to `lawyer-site-app`, then upload the
contents of `hosting/nnamdinwagwu.com/` into `nnamdinwagwu.com/`.

The deployment `index.php` in that folder expects the app to live in the
neighboring `lawyer-site-app` directory. If you rename the app folder,
update the path in that file.

Host `.env` values to set:

```text
APP_NAME="Nwagwu Chambers"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://nnamdinwagwu.com

MAIL_MAILER=smtp
MAIL_SCHEME=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_FROM_ADDRESS=chambers@nnamdinwagwu.com
MAIL_FROM_NAME="${SITE_OWNER_NAME}"
```

If you only have FTP and no shell access, make sure the app is fully
installed locally before upload and keep `vendor/` in the deployed app
folder.

## 6. GitHub Actions Deployment

The repo now includes GitHub Actions for automated deployment:

- `pull_request` to `main` runs validation only.
- `push` to `main` deploys the changed files to the server over FTP.

The deploy workflow syncs two targets:

- `/home/ogechih1/lawyer-site-app`
- `/home/ogechih1/nnamdinwagwu.com`

Set these GitHub secrets in the repository settings:

- `FTP_HOST`
- `FTP_USERNAME`
- `FTP_PASSWORD`
- `FTP_PORT` - usually `21` for plain FTP

## Design language

Matches the coming-soon page: ink/parchment/brass palette, Fraunces
(display serif, small caps for the name) + IBM Plex Mono (labels, nav,
docket numbering) + IBM Plex Sans (body). The N.I.N seal from the
coming-soon page is reused as the site's brandmark in the header.
