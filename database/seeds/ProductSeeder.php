<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promotion_price = 0;
        $new = 1;
    	for ($i = 1; $i < 6 ; $i++) { 
            $price = rand(100000, 500000);
    		for ($j = 0; $j < 20 ; $j++) {
                if (rand(0,10) > 8) {
                      $promotion_price = rand(100000, $price);
                      $new = 0;
                } else {
                    $promotion_price = 0;
                    $new = 1;
                }
    			DB::table('products')->insert([
    				'name' =>"Bánh $i"."_"."$j",
    				'id_type' => $i,
    				"description" => str_random(100),
    				"unit_price" => $price,
                    "promotion_price" => $promotion_price,
                    "new" => $new,
    				"image" => "Image.$i".'_'."$j.png",
    			]);
    		} 
    	}   
    }
}
