<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `Problem_files`(`id`,`first_data`,`second_data`,`created_at`,`updated_at`) VALUES
            (2,'Strings_Message.jpg',NULL,NULL,NULL),
            (4,'WhoIsThis.png',NULL,NULL,NULL),
            (5,'findfind.txt',NULL,NULL,NULL),
            (8,'flag',NULL,NULL,NULL),
            (9,'very_easy_forensics.docx',NULL,NULL,NULL),
            (10,'Infomation.jpg',NULL,NULL,NULL),
            (11,'you_are_web_developer.zip',NULL,NULL,NULL),
            (12,'Use_your_eyes',NULL,NULL,NULL),
            (14,'image_file.7z',NULL,NULL,NULL),
            (15,'extraction.png',NULL,NULL,NULL),
            (17,'Final_task.zip',NULL,NULL,NULL),
            (18,'File_Recovery.png',NULL,NULL,NULL),
            (19,'flag.pcap',NULL,NULL,NULL),
            (20,'hide_and_seek',NULL,NULL,NULL);
        ");
    }
}
