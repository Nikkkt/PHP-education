<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateReport extends Command
{
    protected $signature = 'report:generate {type} {--detailed}';
    protected $description = 'Generate a report of the specified type';

    public function handle()
    {
        $type = $this->argument('type');
        $detailed = $this->option('detailed');

        $this->info("Generating $type report...");
        if ($detailed) {
            $this->warn('Including detailed information.');
        }

        // Логіка генерації звіту
        $this->info('Report generated successfully!');
    }
}
