# cPanel Deployment Guide

This Laravel project can run on cPanel, but the safest setup on shared hosting is different from a VPS.

For this app, the main cPanel constraint is that shared hosting usually does not provide:

- Nginx control
- Supervisor
- a persistent Node SSR process

Because of that, for cPanel you should usually deploy this app with:

- `INERTIA_SSR_ENABLED=false`
- `QUEUE_CONNECTION=sync`
- `SESSION_DRIVER=file`
- `CACHE_STORE=file`

That avoids the need for:

- a long-running Inertia SSR server
- a long-running queue worker
- database-backed sessions/cache unless you explicitly want them

## 1. Recommended cPanel Setup

Use this layout if possible:

- application files outside `public_html`
- web root pointing to the Laravel `public` directory

Example:

- app path: `/home/USERNAME/coffeepulseuganda`
- public root: `/home/USERNAME/coffeepulseuganda/public`

If cPanel lets you create an addon domain or subdomain with a custom document root, point it to the app's `public` directory.

## 2. Best `.env` Values for cPanel

Start from `.env.production.example`, then change these for shared hosting:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public

INERTIA_SSR_ENABLED=false
```

Keep your real database credentials in:

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cpanel_db_name
DB_USERNAME=cpanel_db_user
DB_PASSWORD=your_password
```

## 3. Build Before Uploading

Many cPanel accounts do not have a full Node build environment. The safest approach is to build locally first.

From your local project:

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
```

For cPanel, because SSR will be disabled, the important built output is:

- `public/build`

You do not need to run the SSR server in production on cPanel.

## 4. What to Upload

Upload the application files to something like:

```bash
/home/USERNAME/coffeepulseuganda
```

Make sure the server has:

- your Laravel app files
- `vendor/`
- `public/build/`
- `bootstrap/cache/`

If Composer is available in cPanel Terminal, you can upload the source and run Composer there instead of uploading `vendor/`.

## 5. If You Can Point the Domain to `public/`

This is the cleanest option.

Then on the server run:

```bash
cp .env.production.example .env
php artisan key:generate
php artisan migrate --force
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan view:cache
php artisan event:cache
```

## 6. If Your Primary Domain Is Forced to `public_html`

If cPanel does not let you point the domain to the Laravel `public` folder, use this fallback:

1. Put the Laravel app outside `public_html`, for example `/home/USERNAME/coffeepulseuganda`
2. Copy the contents of the app's `public/` folder into `/home/USERNAME/public_html`
3. Update `public_html/index.php` so it points to the real app directory

Example `index.php` path changes:

```php
require __DIR__.'/../coffeepulseuganda/vendor/autoload.php';

$app = require_once __DIR__.'/../coffeepulseuganda/bootstrap/app.php';
```

The exact path depends on your cPanel username and folder names.

## 7. Database and Permissions

In cPanel:

1. Create a MySQL database
2. Create a database user
3. Assign the user to the database with all privileges
4. Put those values into `.env`

Make sure these are writable:

- `storage/`
- `bootstrap/cache/`

## 8. Queue and Cron

For this project, the easiest cPanel-compatible setup is:

```env
QUEUE_CONNECTION=sync
```

That means queued work runs during the web request and you do not need Supervisor.

If later you want queued jobs on cPanel, use a cron job instead of a persistent worker.

## 9. Storage Link

This app serves uploaded files from the public disk, so run:

```bash
php artisan storage:link
```

If symlinks are blocked by your host, tell me and I can help you switch this app to a cPanel-safe upload strategy.

## 10. Important Note About SSR

This project includes Inertia SSR support, but shared cPanel hosting is usually not a good place to run it.

For cPanel, use:

```env
INERTIA_SSR_ENABLED=false
```

The site will still work as a normal Laravel + Inertia app.

## 11. Final cPanel Checklist

Before going live, confirm:

- `.env` exists with production values
- `APP_DEBUG=false`
- `INERTIA_SSR_ENABLED=false`
- `QUEUE_CONNECTION=sync`
- domain points to Laravel `public`, or `public_html/index.php` was updated correctly
- `vendor/` exists
- `public/build/` exists
- migrations ran successfully
- `storage:link` exists
- uploads and login pages work
