<?php

namespace App\Console\Commands;

use App\Models\Coop;
use Illuminate\Console\Command;

class CoopCancellation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coop:cancellation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Coop::where('status', '!=', 'cancelled')
            ->where('expiration_date', '<=', date('Y-m-d'))
            ->chunk(100, function ($coops) {
                foreach ($coops as $coop)
                    $coop->cancel();
        });

        return 0;
    }
}
