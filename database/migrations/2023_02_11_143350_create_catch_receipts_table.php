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
        Schema::create('catch_receipts', function (Blueprint $table) {
            $table->id();
             $table->string('customer_name')->nullable();
                $table->string('Statement')->nullable();
                $table->string('Quantity')->nullable();
                $table->string('price')->nullable();
                $table->string('total')->nullable();
                $table->string('vate')->nullable();
                $table->string('total_afetr_vate')->nullable();
                $table->string('date')->nullable();
                $table->string('time')->nullable();
                $table->string('reference_no')->nullable();
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
        Schema::dropIfExists('catch_receipts');
    }
};
