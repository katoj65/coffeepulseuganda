#!/usr/bin/env bash

set -euo pipefail

APP_DIR="${APP_DIR:-/var/www/coffeepulseuganda}"
PHP_BIN="${PHP_BIN:-php}"
COMPOSER_BIN="${COMPOSER_BIN:-composer}"
NPM_BIN="${NPM_BIN:-npm}"

cd "$APP_DIR"

"$PHP_BIN" artisan down || true
trap '"$PHP_BIN" artisan up || true' EXIT

"$COMPOSER_BIN" install --no-dev --prefer-dist --optimize-autoloader
"$NPM_BIN" ci
"$NPM_BIN" run build

"$PHP_BIN" artisan migrate --force
"$PHP_BIN" artisan storage:link || true
"$PHP_BIN" artisan optimize:clear
"$PHP_BIN" artisan config:cache
"$PHP_BIN" artisan view:cache
"$PHP_BIN" artisan event:cache
"$PHP_BIN" artisan up

trap - EXIT

printf '\nDeployment completed.\n'
printf 'If you use Supervisor, restart the worker and SSR services now.\n'
