<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->unsignedInteger('id_type');
            $table->foreign('id_type')->references('id')->on('type_products');
            $table->mediumText('description');
            $table->float('unit_price');
            $table->float('promotion_price')->nullable()->default(0);
            $table->string('image', 256);
            $table->boolean('new')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
