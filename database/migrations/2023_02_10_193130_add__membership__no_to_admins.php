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
        Schema::table('admins', function (Blueprint $table) {
            //
            $table->string('Membership_No')->nullable();
            $table->string('Quadruple_name')->nullable();
           

              $table->enum('genderType', ['male', 'female','other'])->default('other');

            $table->string('date_of_birth')->nullable();
            $table->string('Place_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('residence')->nullable();
            $table->string('director')->nullable();
            $table->string('Neighborhood_village_street')->nullable();
            $table->string('constituency')->nullable();
            $table->string('The_electoral_center')->nullable();
            $table->string('Electoral_card_number')->nullable();

            $table->string('Educational_Qualification')->nullable();
            $table->string('where_to_get_it')->nullable();
            $table->string('received_date')->nullable();

           
            $table->string('Job_profession')->nullable();
            $table->string('work_address')->nullable();
           
            $table->string('house_number')->nullable();

            $table->string('talents_and_abilities')->nullable();
            $table->string('Facebook_account')->nullable();
            $table->string('Identification_type')->nullable();
            $table->string('Identification_number')->nullable();

            $table->string('Place_of_issue_of_Identification_number')->nullable();
            $table->string('date_of_issue_Identification_number')->nullable();

            

             $table->enum('Have_you_ever_joined_any_previous_political_party', ['yes', 'no'])->default('no');

         $table->enum('Have_you_ever_run_for_a_council', ['deputies', 'local','no'])->default('no');
         $table->enum('Have_you_ever_won_a_board', ['deputies', 'local','no'])->default('no');

            $table->string('about_party')->nullable();
            $table->string('about_a_circle')->nullable();
            $table->string('about_a_year')->nullable();

           

         $table->enum('Have_you_ever_been_involved_in_public_volunteer_work', ['Association', 'union','charity','institution','no'])->default('no');

            $table->string('The_Secretariat_in_which_you_wish_to_work')->nullable();

 
         
  
            $table->string('photo')->nullable();

             $table->enum('type', 
                [
                     'superadmin',
                      'admin',
                      'Member',
                    
                 ])->default('admin');
        });
            

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
};
