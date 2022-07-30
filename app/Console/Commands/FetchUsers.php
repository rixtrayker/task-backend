<?php

namespace App\Console\Commands;

use App\Factories\UserFactory;
use Illuminate\Console\Command;

class FetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FetchUsers:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching Users and storing them into users table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UserFactory::handle();
    }
}
