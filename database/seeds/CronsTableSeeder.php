<?php

use App\Cron;
use Illuminate\Database\Seeder;

class CronsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $console = new Cron;
        $console->name = 'test';
        $console->enabled = 0;
        $console->save();
    }
}
