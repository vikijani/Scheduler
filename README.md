This project was developed as part of a backend technical assessment to demonstrate Laravel Scheduler, Queue, Notifications, and full-stack integration using Nuxt 4.

# Birthday Scheduler

A simple full-stack application built with **Nuxt 4**, **Laravel 13**, **MySQL**, and **Tailwind CSS**.

The application allows users to register their name, birthday, email, and phone number. Laravel Scheduler automatically checks birthdays on a scheduled interval and dispatches queued jobs to send birthday notifications.

---

## Technologies

### Frontend
- Nuxt 4
- Tailwind CSS

### Backend
- Laravel 13
- MySQL
- Laravel Scheduler
- Laravel Queue
- Laravel Notifications
- Laravel Mail
- Custom SMS Channel (Logging)
- Eloquent ORM

---

## Features

- Register users
- Server-side validation
- Store user information in MySQL
- Scheduled birthday checking
- Queue-based background processing
- Notification system
- Email notification logging
- SMS notification logging
- Clean project structure following Laravel best practices

---

## Project Workflow

```text
User submits the form

        │
        ▼

Nuxt Frontend
        │
        ▼

Laravel Controller
        │
        ├── Validate Request
        └── Store User
        │
        ▼

MySQL Database
        │
        ▼

Laravel Scheduler
(Runs on schedule)
        │
        ▼

Birthday Check Command
        │
        ▼

Find today's birthdays
        │
        ▼

Dispatch SendBirthdayMessageJob
        │
        ▼

Queue
        │
        ▼

Queue Worker
        │
        ▼

Birthday Notification
        │
        ├── Mail Channel
        │        ▼
        │   event-mail.log
        │
        └── SMS Channel
                 ▼
              sms.log
```

---

## Installation

Clone the repository

```bash
git clone <repository-url>
```

Install backend dependencies

```bash
composer install
```

Install frontend dependencies

```bash
npm install
```

Create the environment file

```bash
cp .env.example .env
```

Generate the application key

```bash
php artisan key:generate
```

Run database migrations

```bash
php artisan migrate
```

Start Laravel

```bash
php artisan serve
```

Start Nuxt

```bash
npm run dev
```

Run the Queue Worker

```bash
php artisan queue:work
```

Run the Scheduler locally

```bash
php artisan schedule:work
```

---

## Logging

Instead of sending real notifications during development, the project writes notification events into dedicated log files.

- Email → `storage/logs/event-mail.log`
- SMS → `storage/logs/sms.log`

---

## Architecture

The application follows Laravel's separation of concerns.

- **Controller** handles validation and persistence.
- **Command** searches for users whose birthday is today.
- **Scheduler** executes the command automatically.
- **Job** performs background processing.
- **Notification** determines the delivery channel.
- **Mail Channel** logs email notifications.
- **SMS Channel** logs SMS notifications.

---

## Future Improvements

- Real SMTP email integration
- Real SMS provider integration
- Retry failed jobs
- Dashboard for notification history
- Unit & Feature Tests
- Docker support