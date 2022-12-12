## Packages:

- [Intervention Image](https://image.intervention.io/v2).
- [Telegram Bot API - PHP SDK](https://github.com/irazasyed/telegram-bot-sdk).
- [Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction).
- [jd-dotlogics/laravel-grapesjs](https://github.com/jd-dotlogics/laravel-grapesjs).
- [protonemedia/laravel-cross-eloquent-search](https://github.com/protonemedia/laravel-cross-eloquent-search).

## Initial project on prod:

- copy .env.example => .env
- Set APP_NAME, APP_URL, DEBUG FALSE, DATABASE CONNECTION, EMAIL_CONNECTION etc
- composer i
- php artisan migrate
- php artisan storage:link
- php artisan key:generate
- php artisan project:init

## Initial project for developing:

- copy .env.example => .env
- Set APP_NAME, APP_URL, DATABASE CONNECTION, EMAIL_CONNECTION etc
- composer i
- php artisan migrate
- php artisan storage:link
- php artisan key:generate
- php artisan project:init
- npm i
- php artisan serve
- npm run dev
