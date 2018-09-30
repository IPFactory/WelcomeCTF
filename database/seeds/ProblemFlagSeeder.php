<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemFlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `Problem_flags` (`id`,`correct_flag`,`solve_count`,`created_at`,`updated_at`) VALUES
            (1,'welcomeCTF{Let\'s_enjoy_CTF}',0,NULL,NULL),
            (2,'welcomeCTF{easy_forensics_COM}',0,NULL,NULL),
            (3,'welcomeCTF{Efini_RX-7}',0,NULL,NULL),
            (4,'welcomeCTF{TUX}',0,NULL,NULL),
            (5,'welcomeCTF{ctrl+F}',0,NULL,NULL),
            (6,'welcomeCTF{EZ_J50N_W36_T0K3N}',0,NULL,NULL),
            (7,'welcomeCTF{FREEDOM}',0,NULL,NULL),
            (8,'welcomeCTF{brainfack}',0,NULL,NULL),
            (9,'welcomeCTF{4r3 y0u 3nj0y1n6 f0r3n51c5?}',0,NULL,NULL),
            (10,'welcomeCTF{Chick_UserComment}',0,NULL,NULL),
            (11,'welcomeCTF{Hi_d3v3l0p3r!_1s_th15_t00_e45y?}',0,NULL,NULL),
            (12,'welcomeCTF{USS_Zumwalt}',0,NULL,NULL),
            (13,'welcomeCTF{BABY_SIMPLE_BINARY}',0,NULL,NULL),
            (14,'welcomeCTF{GarakutaDollPlay:)}',0,NULL,NULL),
            (15,'welcomeCTF{MOFUMOFU_is_cute}',0,NULL,NULL),
            (16,'welcomeCTF{obfuscation}',0,NULL,NULL),
            (17,'welcomeCTF{Someday_you_will_see}',0,NULL,NULL),
            (18,'welcomeCTF{PNG_Magic}',0,NULL,NULL),
            (19,'welcomeCTF{packet_oisii}',0,NULL,NULL),
            (20,'welcomeCTF{YouC4nF1ndH1mH1dd3n}',0,NULL,NULL),
            (21,'welcomeCTF{console.log(!0,1e4,2<<20)}',0,NULL,NULL),
            (22,'welcomeCTF{THE_NORTH_WIND_AND_THE_SUN}',0,NULL,NULL),
            (23,'welcomeCTF{pasopi}',0,NULL,NULL),
            (24,'welcomeCTF{C0n6r4tul4ti0n5!!Y0u_4repr0!!}',0,NULL,NULL);
        ");
    }
}
