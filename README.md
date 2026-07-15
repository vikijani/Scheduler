# Birthday Scheduler

A Laravel practice project for sending birthday congratulations via Email or SMS.

## Tech Stack
- Laravel 13
- MySQL
- Laravel Scheduler
- Notifications

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Run Scheduler

```bash
php artisan schedule:work
```
