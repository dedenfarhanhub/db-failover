<?php

namespace SultanDB\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use SultanDB\Helpers\Telegram;

class DBMonitor
{
    public function handle($request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            Telegram::sendMessage("🚨 Database Down: " . $e->getMessage());
        }

        return $next($request);
    }
}