<?php

namespace App\Console;

use App\Console\Commands\CheckBirthdayCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        CheckBirthdayCommand::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
//        $schedule->command('check:birthday')->dailyAt('9:00');
        $schedule->command('check:birthday')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
