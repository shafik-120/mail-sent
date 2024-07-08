<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'password' => fake()->uuid()
        ]);
    }
}
