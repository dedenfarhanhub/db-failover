<?php

namespace SultanDB\Helpers;

use GuzzleHttp\Client;

class Telegram
{
    public static function sendMessage($message)
    {
        $token = config('db-failover.telegram.token');
        $chat_id = config('db-failover.telegram.chat_id');

        $client = new Client();
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $client->post($url, [
            'json' => [
                'chat_id' => $chat_id,
                'text' => $message,
            ]
        ]);
    }
}