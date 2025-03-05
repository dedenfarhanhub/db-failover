<?php

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