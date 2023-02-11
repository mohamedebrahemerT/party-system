<?php

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use App\Models\tax;

use App\Models\currency;
 
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}
 

if (!function_exists('setting'))

 {

     function setting()

   {

         return   App\Models\Setting::orderBy('id','desc')->first();



   }

}
 
   if (!function_exists('checkPermissionGroup')) {
    function checkPermissionGroup($permission, $group) {
        $explode_name = explode('_', $permission);
        $role = $group->role()->where('name', $explode_name[0])->first();
        if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
            return true;
        }
        return false;
    }
}

if (!function_exists('load_dep')) {

    function load_dep($select = null, $dep_hide = null) {



        $departments = \App\Models\Department::selectRaw('name'.' as text')

            ->selectRaw('id as id')

            ->selectRaw('parent as parent')

            ->get(['text', 'parent', 'id']);

        $dep_arr = [];

        foreach ($departments as $department) {

            $list_arr             = [];

            $list_arr['icon']     = '';

            $list_arr['li_attr']  = '';

            $list_arr['a_attr']   = '';

            $list_arr['children'] = [];



            if ($select !== null and $select == $department->id) {



                $list_arr['state'] = [

                    'opened'   => true,

                    'selected' => true,

                    'disabled' => false,

                ];

            }



            if ($dep_hide !== null and $dep_hide == $department->id) {



                $list_arr['state'] = [

                    'opened'   => false,

                    'selected' => false,

                    'disabled' => true,

                    'hidden'   => true,

                ];

            }



            $list_arr['id']     = $department->id;

            $list_arr['parent'] = $department->parent > 0?$department->parent:'#';

            $list_arr['text']   = $department->text;

            array_push($dep_arr, $list_arr);

        }



        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);

    }
    }


if (!function_exists('getcurrency')) 
{
    function getcurrency() 
    {
          if (currency::orderBy('id','desc')->first()) 
       {
 
        if (currency::where('status','1')->first()) 
        {
            $currency=currency::where('status','1')->first();
        return $currency=$currency->name;
        }
        else
        {
            return $currency=trans('trans.LE');  
        }
      }
      else
      {
         return $currency=trans('trans.LE');
      }

    }
}

if (!function_exists('gettax')) 
{
    function gettax() 
    {
        
        if (tax::orderBy('id','desc')->first()) 
       {
 
        if (tax::where('status','1')->first()) 
        {
            $tax=tax::where('status','1')->first();
          $tax=$tax->rate;
        }
        else
        {
              $tax=0;  
        }
      }
      else
      {
           $tax=0;
      }

           return $tax;
    }
}


if (!function_exists('messageTowhatsapp'))
{
    function messageTowhatsapp($phone=null,$text=null,$mndphone=null,$sendmndphone=null)
    {



      $phone='2'.$phone;
      $mndphone='2'.$mndphone;

         if ($sendmndphone == '1')
         {
             $text=$text.$mndphone;
         }
         else
         {
            $text=$text;
         }

  $string_json = '{
    "messaging_product": "whatsapp",
    "to": "'.$phone.'",
    "type": "text",
    "text": {
        "preview_url": true,
        "body": "'.$text.'"
    }
}';

     $whatsappSettings=App\Models\whatsappSettings::where('status','1')->first();

      $endpoint_url =$whatsappSettings->endpoint_url;
      $BearerAuthorization =BearerAuthorization();


try {

  $client = new \GuzzleHttp\Client();
$options= array(
  'headers'  => [
    'content-type' => 'application/json',
    'Accept' => 'application/json',
      'Authorization'=>'Bearer '.$BearerAuthorization,//This token will expire in 23 hours.
],
  'body' => $string_json,

);


   $res = $client->post($endpoint_url, $options);
          $response=$res->getBody()->getContents();
              $data = json_decode($response, true);

              return 1;

} catch (\Exception $e)
{

    return  0;
}



    }
}


if (!function_exists('getBearerAuthorization'))
{
    function getBearerAuthorization($whatsappSettings)
    {
      
     $client_id=$whatsappSettings->client_id;
     $client_secret=$whatsappSettings->client_secret;
     $grant_type=$whatsappSettings->grant_type;

        try {

            $endpoint_url='https://graph.facebook.com/oauth/access_token?client_id='.$client_id.'&client_secret='. $client_secret.'&grant_type='.$grant_type;

  $client = new \GuzzleHttp\Client();
$options= array();


   $res = $client->post($endpoint_url, $options);
          $response=$res->getBody()->getContents();
              $data = json_decode($response, true);

    $whatsappSettings->BearerAuthorization=$data['access_token'];
     $whatsappSettings->save();


              return  $data['access_token'];

} catch (\Exception $e)
{

    return  0;
}
        
    }
}

if (!function_exists('BearerAuthorization'))
{
    function BearerAuthorization()
    {
 
        
     $whatsappSettings=App\Models\whatsappSettings::where('status','1')->first();


   return  $BearerAuthorization=$whatsappSettings->BearerAuthorization;


     /*$client_id=$whatsappSettings->client_id;
     $client_secret=$whatsappSettings->client_secret;
     $grant_type=$whatsappSettings->grant_type;

        try {

            $endpoint_url='https://graph.facebook.com/oauth/access_token?client_id='.$client_id.'&client_secret='. $client_secret.'&grant_type='.$grant_type;

  $client = new \GuzzleHttp\Client();
$options= array();


   $res = $client->post($endpoint_url, $options);
          $response=$res->getBody()->getContents();
              $data = json_decode($response, true);

    $whatsappSettings->BearerAuthorization=$data['access_token'];
     $whatsappSettings->save();


              return  $data['access_token'];

} catch (\Exception $e)
{

    return  0;
}*/
        
    }
}