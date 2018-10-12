<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProblemSeeder::class);
        $this->call(ProblemFileSeeder::class);
        $this->call(ProblemFlagSeeder::class);
        //$this->call(ActiveLogSeeder::class);
    }
}
