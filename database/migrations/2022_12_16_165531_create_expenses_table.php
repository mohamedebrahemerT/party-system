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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
               

               $table->bigInteger('TypesOfExpenses_id')->unsigned()->nullable();
            $table->foreign('TypesOfExpenses_id')->references('id')->on('types_of_expenses')->onDelete('cascade');

              $table->decimal('value', 10, 2)->nullable();
              $table->longText('desc')->nullable();

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
        Schema::dropIfExists('expenses');
    }
};
