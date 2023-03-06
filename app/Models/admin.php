<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class admin extends Authenticatable
{
        use Notifiable;






         protected $fillable = [
        'name', 'email', 'phone', 'image','password','group_id',
        'Membership_No',
'Quadruple_name',
'genderType',
'date_of_birth',
'Place_of_birth',
'marital_status',
'residence',
'director',
'Neighborhood_village_street',
'constituency',
'The_electoral_center',
'Electoral_card_number',

'Educational_Qualification',
'where_to_get_it',
'received_date',

'Job_profession',
'work_address
house_number',
 
'talents_and_abilities',
'Facebook_account',
'Identification_type',
'Identification_number',
'Place_of_issue_of_Identification_number',
'date_of_issue_Identification_number',
'Have_you_ever_joined_any_previous_political_party',
'Have_you_ever_run_for_a_council',
'Have_you_ever_won_a_board',
'about_party',
'about_a_circle',
'about_a_year',
'Have_you_ever_been_involved_in_public_volunteer_work',
'The_Secretariat_in_which_you_wish_to_work',
'email',
'password',
'photo',
'GeneralSyndicate',
'subguild',
'club',

    ];
     protected $hidden = [
        'password', 'remember_token',
    ];


        public function group_id() {
        return $this->hasOne(\App\Models\AdminGroup::class, 'id', 'group_id');
    }

    public function role($name) {
           
             $explode_name = explode('_', $name);


             $group_id= admin()->user()->group_id;

         

            $AdminGroup_id= AdminGroup::where('id', $group_id)->first() ;
            

            if (!empty( $AdminGroup_id) ) 
            {
                      $explode_name[0];
                $role =  $AdminGroup_id->role()->where('name', $explode_name[0])->first();
                if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
                                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
    }


     public function other_data_R() {
        return $this->hasMany('App\Models\otherData', 'member_id', 'id');
    }


}
