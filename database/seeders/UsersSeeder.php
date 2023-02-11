<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'name' => 'Admin',
            'phone' => '090123456789',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'naked' => 'secret'
        ]
    );
    }
}
