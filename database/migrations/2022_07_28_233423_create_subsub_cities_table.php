<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsub_cities', function (Blueprint $table) {
            $table->id();
              $table->string('name')->nullable();
            $table->string('code')->nullable();

             $table->bigInteger('city_id')->unsigned()->nullable();
     $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

     $table->bigInteger('subCity_id')->unsigned()->nullable();
     $table->foreign('subCity_id')->references('id')->on('sub_cities')->onDelete('cascade');

     

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
        Schema::dropIfExists('subsub_cities');
    }
}
