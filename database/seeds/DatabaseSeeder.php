<?php

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
        $this->call('UsersSeeder');
        $this->call('MenusTableSeeder');
        $this->call('EmailSeeder');
        $this->call('BookAndWriterSeeder');
    }
}
