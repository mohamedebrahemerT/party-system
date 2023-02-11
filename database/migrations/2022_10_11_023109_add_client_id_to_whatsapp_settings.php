<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdToWhatsappSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapp_settings', function (Blueprint $table) {
            //
               $table->string('client_id')->nullable();
               $table->string('client_secret')->nullable();
               $table->string('grant_type')->nullable();
               

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapp_settings', function (Blueprint $table) {
            //
        });
    }
}
