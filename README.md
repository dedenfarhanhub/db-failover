# SultanDB - Laravel DB Failover Package

![Build](https://github.com/dedenfarhanhub/db-failover/actions/workflows/main.yml/badge.svg)

## Description
**SultanDB** is a Laravel package that automatically performs failover to a backup database connection when the primary connection is down. This package supports:

- Dynamic Connection Switching
- Circuit Breaker Pattern
- Telegram & Slack Notification
- Auto DB Health Monitoring
- Redis Fallback Cache
- CI/CD Pipeline

## Installation
### 1. Install via Composer
```bash
composer require dedenfarhanhub/db-failover
```

### 2. Publish Configuration
```bash
php artisan vendor:publish --tag=db-failover-config
```

### 3. Environment Setup
Add the following lines to your `.env` file:
```env
DB_FAILOVER_TELEGRAM=true
TELEGRAM_BOT_TOKEN=xxxxxx
TELEGRAM_CHAT_ID=xxxxx
```

## Usage Example
### Middleware Implementation
Add middleware to `app/Http/Kernel.php`:
```php
protected $middleware = [
    \SultanDB\Middleware\DBMonitor::class,
];
```

### Sending Manual Telegram Notification
```php
use SultanDB\Helpers\Telegram;

Telegram::sendMessage("Database is down!");
```

## Features
### 1. Dynamic Connection Switching
Automatically switches from the `primary` connection to the `secondary` connection if the primary connection fails.

### 2. Circuit Breaker Pattern
Counts the number of failures within a certain period before automatically breaking the connection.

### 3. Automatic Notifications
Sends notifications to Telegram if there is any database connection issue.

### 4. Redis Fallback Cache
Automatically falls back to Redis Cache if all database connections fail.

## Configuration
**config/db-failover.php**
```php
return [
    'telegram' => [
        'enabled' => env('DB_FAILOVER_TELEGRAM', true),
        'token' => env('TELEGRAM_BOT_TOKEN'),
        'chat_id' => env('TELEGRAM_CHAT_ID'),
    ],
    'circuit_breaker' => [
        'attempt_limit' => 3,
        'timeout' => 300,
    ],
    'db_switch' => [
        'redis_timeout' => 300,
    ],
];
```

## Testing

```bash
php artisan test
```

## Contributing
Pull requests are highly welcome 🔥. Please include tests and documentation where possible.

## License
[MIT](LICENSE)

