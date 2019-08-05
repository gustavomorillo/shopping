<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id'); 
            $table->string('name');
            $table->string('second_name');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modals');
    }
}
