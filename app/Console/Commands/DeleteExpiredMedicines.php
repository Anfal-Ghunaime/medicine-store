<?php

namespace App\Console\Commands;

use App\Models\Med;
use Illuminate\Console\Command;

class DeleteExpiredMedicines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-medicines';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Med::query()->where('exp_date', '<', now())->delete();
    }
}
