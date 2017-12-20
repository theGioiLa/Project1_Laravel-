<?php

use Illuminate\Database\Seeder;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
    	for ($i=1; $i < 6; $i++) { 
   		DB::table('type_products')->insert([
   			'id'=> $i,
        	'name' =>  "Bánh $i",
            'description' => str_random(20),
        	'image' => "Image.$i".'_'.rand(0, 20).".png"
        ]);
    	}
    }
}
