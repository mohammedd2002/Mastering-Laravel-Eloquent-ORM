<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->unverified()->admin()->trashed()->sequence(
            ['is_admin' => 1],
            ['is_admin' => 0]
        )->create();
        // AdminFactory::new()->count(10)->create();
    }
}
