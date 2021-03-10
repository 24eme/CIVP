<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(ProfilSeeder::class);
      $this->call(OrganismeSeeder::class);
      $this->call(EvenementSeeder::class);
    }
}
