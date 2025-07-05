<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LogClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the application log file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the log file path
        $logFile = storage_path('logs/laravel.log');

        // Check if file exists before clearing
        if (File::exists($logFile)) {
            // Clear the file content
            File::put($logFile, '');
            $this->info('Log file cleared successfully!');
        } else {
            $this->comment('Log file does not exist.');
        }
    }
}
