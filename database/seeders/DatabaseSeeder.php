<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(PartiesTableSeeder::class);
        //  $this->call(StateTableSeeder::class);
        //  $this->call(LgaTableSeeder::class);
        //  $this->call(WardTableSeeder::class);
      $this->call(RolesAndPermissionsSeeder::class);
      $this->call([
        SpreadsheetSeeder::class,
    ]);
    }
}
