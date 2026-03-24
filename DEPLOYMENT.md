# Deployment Guide

This project is a Laravel 13 application with:

- PHP 8.3
- Laravel Jetstream / Inertia
- Vue 3 + Vite
- Inertia SSR enabled
- Database-backed sessions, cache, and queues
- Public file uploads served from the `public` disk

Because of that, production needs more than just `git pull`:

- install PHP dependencies
- build frontend assets
- build the SSR bundle
- run database migrations
- create the storage symlink
- keep the queue worker running
- keep the Inertia SSR server running

## 1. Server Requirements

Recommended production stack:

- Ubuntu 24.04 LTS
- Nginx
- PHP 8.3 + PHP-FPM
- Composer 2
- Node.js 20 or newer
- MySQL 8 / MariaDB 10.6+ for production data
- Supervisor for long-running Laravel processes

Required PHP extensions usually include:

- `bcmath`
- `ctype`
- `curl`
- `fileinfo`
- `json`
- `mbstring`
- `openssl`
- `pdo`
- `pdo_mysql`
- `tokenizer`
- `xml`
- `zip`
- `pcntl` for the Inertia SSR command

## 2. Upload the Project

Clone the project to the server, for example:

```bash
cd /var/www
git clone <your-repository-url> coffeepulseuganda
cd coffeepulseuganda
```

If you deploy from CI instead of cloning directly on the server, remember that this repository ignores built assets:

- `public/build`
- `bootstrap/ssr`

That means the deploy pipeline must run `npm ci` and `npm run build`.

## 3. Configure Environment

Use the included production template:

```bash
cp .env.production.example .env
php artisan key:generate
```

Then edit `.env` and set at minimum:

- `APP_NAME`
- `APP_URL`
- `APP_ENV=production`
- `APP_DEBUG=false`
- `DB_*`
- `MAIL_*`
- `SESSION_DOMAIN` if needed
- `INERTIA_SSR_ENABLED=true`

For this app, MySQL or MariaDB is the better production choice than SQLite because the application uses database-backed:

- sessions
- cache
- queue jobs

## 4. Install Dependencies and Build

Run:

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
```

The build command creates both:

- `public/build`
- `bootstrap/ssr`

## 5. Run Laravel Setup Commands

Run these from the project root:

```bash
php artisan migrate --force
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan view:cache
php artisan event:cache
```

Do not use `php artisan route:cache` yet in this project because `routes/web.php` currently contains closure routes.

## 6. Set Permissions

Make sure the web server user can write to:

- `storage`
- `bootstrap/cache`

Example:

```bash
sudo chown -R www-data:www-data /var/www/coffeepulseuganda
sudo find /var/www/coffeepulseuganda/storage -type d -exec chmod 775 {} \;
sudo find /var/www/coffeepulseuganda/bootstrap/cache -type d -exec chmod 775 {} \;
```

Adjust the path if your app lives somewhere else.

## 7. Nginx

Use the template at [deploy/nginx/coffeepulseuganda.conf](deploy/nginx/coffeepulseuganda.conf) and update:

- `server_name`
- `root`
- PHP-FPM socket path if your PHP version/path differs

Then enable it and reload Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/coffeepulseuganda /etc/nginx/sites-enabled/coffeepulseuganda
sudo nginx -t
sudo systemctl reload nginx
```

## 8. Long-Running Processes

This app should run two background processes in production:

1. Laravel queue worker
2. Inertia SSR server

Supervisor templates are included here:

- [deploy/supervisor/laravel-worker.conf](deploy/supervisor/laravel-worker.conf)
- [deploy/supervisor/inertia-ssr.conf](deploy/supervisor/inertia-ssr.conf)

After copying them into `/etc/supervisor/conf.d/`, run:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker
sudo supervisorctl start inertia-ssr
```

You can verify SSR with:

```bash
php artisan inertia:check-ssr
```

## 9. SSL

After Nginx is serving the site, install HTTPS with Certbot:

```bash
sudo certbot --nginx -d your-domain.com -d www.your-domain.com
```

Then make sure `.env` has:

```env
APP_URL=https://your-domain.com
SESSION_SECURE_COOKIE=true
```

## 10. Zero-Downtime Deploy Flow

A simple deploy flow for updates is:

```bash
cd /var/www/coffeepulseuganda
git pull
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan view:cache
php artisan event:cache
sudo supervisorctl restart laravel-worker
sudo supervisorctl restart inertia-ssr
```

There is also a helper script at [deploy/deploy.sh](deploy/deploy.sh) you can adapt for your server.

## 11. Simpler Option: Disable SSR

If you do not want to keep a Node-based SSR process running on the server, set:

```env
INERTIA_SSR_ENABLED=false
```

Then you can skip the `inertia-ssr` Supervisor process. The site will still work as a normal Laravel + Inertia application, but you will lose SSR behavior.

## 12. Quick Checklist

Before going live, confirm:

- DNS points to your server
- `.env` uses production values
- `APP_DEBUG=false`
- database credentials work
- `php artisan migrate --force` succeeded
- `php artisan storage:link` exists
- Nginx points to `/public`
- `laravel-worker` is running
- `inertia-ssr` is running, or SSR is disabled intentionally
- HTTPS is active
