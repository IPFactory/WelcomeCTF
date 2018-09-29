<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `author`(`name`,`link`) VALUES
            (1,'smicle','https://twitter.com/smicle_cl'),
            (2,'somebody_gp','https://twitter.com/somebody_gp'),
            (3,'miyagaw61','https://twitter.com/miyagaw61'),
            (4,'iria_piyo','https://twitter.com/iria_piyo'),
            (5,'8ayac','https://twitter.com/8ayac'),
            (6,'cha1aza','https://twitter.com/cha1aza'),
            (7,'haniwasanndayo','https://twitter.com/haniwasanndayo'),
            (8,'A`zara_','https://twitter.com/ROT13bhxnfnxhen'),
            (9,'no1zy','https://twitter.com/no1zy_sec');
        ");

    }
}
