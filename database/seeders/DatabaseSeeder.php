<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\Reason;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Client::factory(20)->create();

        Reason::factory(20)->create();
    }
}
