<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_data', function (Blueprint $table) {
            $table->id();

           

             $table->bigInteger('member_id')->unsigned()->nullable();
            $table->foreign('member_id')->references('id')->on('admins')->onDelete('cascade');

                $table->string('input_key')->nullable(); 
                $table->string('input_value')->nullable(); 

                
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
        Schema::dropIfExists('other_data');
    }
};
