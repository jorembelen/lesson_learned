<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectLocationSeeder::class);

        User::create([
            'name' => 'Site Admin',
            'username' => 'site.admin',
            'role' => 5,
            'email' => 'admin@gmail.com',
        ]);

        User::create([
            'name' => 'Site User',
            'username' => 'site.user',
            'role' => 0,
            'email' => 'john@doe.com',
            'project_location_id' => 37,
        ]);

        User::create([
            'name' => 'Site Manager',
            'username' => 'site.manager',
            'role' => 1,
            'email' => 'peter@doe.com',
            'project_location_id' => 37,
        ]);

    }
}
