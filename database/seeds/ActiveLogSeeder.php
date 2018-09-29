<?php

use Illuminate\Database\Seeder;

class ActiveLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<700;$i++){
            factory(App\Model\ActiveLog::class)->create();
        }
    }
}
