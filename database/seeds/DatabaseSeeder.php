<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // afnan
    public function run()
    {
      $this->call(LaratrustSeeder::class);
    }
}
