<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) { 
            	DB::table('slide')->insert([
            		'id' => $i,
            		'link' => '',
            		'image' => "Banner$i.jpg"
            	]);
        }    
    }
}
