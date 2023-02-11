<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCityToUserAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            //

 
     $table->bigInteger('subCity_id')->unsigned()->nullable();
     $table->foreign('subCity_id')->references('id')->on('sub_cities')->onDelete('cascade');

$table->bigInteger('subsubCity_id')->unsigned()->nullable();
     $table->foreign('subsubCity_id')->references('id')->on('subsub_cities')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            //
        });
    }
}
