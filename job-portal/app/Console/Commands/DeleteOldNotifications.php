<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeleteOldNotifications extends Command
{
    protected $signature = 'notifications:clean';
    protected $description = 'Delete notifications older than 72 hours';

    public function handle()
    {
        $deleted = DB::table('notifications')
            ->where('created_at', '<', Carbon::now()->subHours(72))
            ->delete();

        $this->info("Deleted {$deleted} notifications older than 72 hours.");
    }
}