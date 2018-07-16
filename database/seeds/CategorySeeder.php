<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `category` (`id`,`category`) VALUES 
            (1,'Misc'),
            (2,'Forensics'),
            (3,'Crypt'),
            (4,'Forensics'),
            (5,'Web'),
            (6,'PPC'),
            (7,'Network'),
            (8,'bin');
        ");

    }
}
