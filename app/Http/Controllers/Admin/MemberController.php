<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\admin;
 
 use Auth;
use Hash;


class MemberController extends Controller
{

    public function __construct() {
           
        $this->middleware('AdminRole:Member_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:Member_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:Member_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:Member_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['ShowMember'],
        ]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        // 
            $Member=admin::where('id','!=',1)->orderBy('id','desc')->get();           

                         return view('admin.Member.index',compact('Member'));
 
    

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.Member.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $data = $this->validate(\request(),
            [
                
                'Membership_No'      => 'sometimes|nullable',
                'Quadruple_name'      => 'sometimes|nullable',
                'Type'      => 'sometimes|nullable',
                'date_of_birth'      => 'sometimes|nullable',
                'Place_of_birth'      => 'sometimes|nullable',
                'marital_status'      => 'sometimes|nullable',
                'residence'      => 'sometimes|nullable',
                'director'      => 'sometimes|nullable',
                'Neighborhood_village_street'      => 'sometimes|nullable',
                'constituency'      => 'sometimes|nullable',
                'The_electoral_center'      => 'sometimes|nullable',
                'Electoral_card_number'      => 'sometimes|nullable',
                'Educational_Qualification'      => 'sometimes|nullable',
                'where_to_get_it'      => 'sometimes|nullable',
                'received_date'      => 'sometimes|nullable',
                'Job_profession'      => 'sometimes|nullable',
                'work_address'      => 'sometimes|nullable',
              'phone' => 'required|unique:admins',
                'house_number'      => 'sometimes|nullable',
                'talents_and_abilities'      => 'sometimes|nullable',
                'Facebook_account'      => 'sometimes|nullable',
                'Identification_type'      => 'sometimes|nullable',
                'Identification_number'      => 'sometimes|nullable',
                'Place_of_issue_of_Identification_number'      => 'sometimes|nullable',
                'date_of_issue_Identification_number'      => 'sometimes|nullable',
                'Have_you_ever_joined_any_previous_political_party'      => 'sometimes|nullable',
                'Have_you_ever_run_for_a_council'      => 'sometimes|nullable',
                'Have_you_ever_won_a_board'      => 'sometimes|nullable',
                'about_party'      => 'sometimes|nullable',
                'about_a_circle'      => 'sometimes|nullable',
                'about_a_year'      => 'sometimes|nullable',
                'Have_you_ever_been_involved_in_public_volunteer_work'      => 'sometimes|nullable',
                'The_Secretariat_in_which_you_wish_to_work'      => 'sometimes|nullable',
                 'email' => 'required|email|unique:admins',
                'password'      => 'sometimes|nullable',
                'photo'      =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     
                 
            ],[],[
                'embership_No'      => trans('trans.Membership_No'),
                'Quadruple_name'      => trans('trans.Quadruple_name'),
                'genderType'      => trans('trans.genderType'),
               'date_of_birth'      => trans('trans.date_of_birth'),
                'Place_of_birth'      => trans('trans.Place_of_birth'),
                'marital_status'      => trans('trans.marital_status'),
                'residence'      => trans('trans.residence'),
                'director'      => trans('trans.director'),
                'Neighborhood_village_street'      => trans('trans.Neighborhood_village_street'),
                'constituency'      => trans('trans.constituency'),
                'The_electoral_center'      => trans('trans.The_electoral_center'),
                'Electoral_card_number'      => trans('trans.Electoral_card_number'),
                'Educational_Qualification'      => trans('trans.Educational_Qualification'),
                'where_to_get_it'      => trans('trans.where_to_get_it'),
                'received_date'      => trans('trans.received_date'),
                'Job_profession'      => trans('trans.Job_profession'),
                'work_address'      => trans('trans.work_address'),
                'phone'      => trans('trans.phone'),
                'house_number'      => trans('trans.house_number'),
                'talents_and_abilities'      => trans('trans.talents_and_abilities'),
                'Facebook_account'      => trans('trans.Facebook_account'),
                'Identification_type'      => trans('trans.Identification_type'),
                'Identification_number'      => trans('trans.Identification_number'),
                'Place_of_issue_of_Identification_number'      => trans('trans.Place_of_issue_of_Identification_number'),
                 'date_of_issue_Identification_number'      => trans('trans.date_of_issue_Identification_number'),
                'Have_you_ever_joined_any_previous_political_party'      => trans('trans.Have_you_ever_joined_any_previous_political_party'),
                'Have_you_ever_run_for_a_council'      => trans('trans.Have_you_ever_run_for_a_council'),
                'Have_you_ever_won_a_board'      => trans('trans.Have_you_ever_won_a_board'),
                'about_party'      => trans('trans.about_party'),
                'about_a_circle'      => trans('trans.about_a_circle'),
                'about_a_year'      => trans('trans.about_a_year'),
                'Have_you_ever_been_involved_in_public_volunteer_work'      => trans('trans.Have_you_ever_been_involved_in_public_volunteer_work'),
                'The_Secretariat_in_which_you_wish_to_work'      => trans('trans.The_Secretariat_in_which_you_wish_to_work'),
                'email'      => trans('trans.email'),
                'password'      => trans('trans.password'),
                'photo'      => trans('trans.photo'),



            ]);

               if ($request->photo) 
               {

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('/images/Member'), $imageName);
            $data['photo'] = 'images/Member/'.$imageName;
           }     
                        $data['password']=Hash::make($request->password);
                        $data['type']='Member';

        $Member=admin::create($data);
        session()->flash('success', trans('trans.createSuccess'));

        
             


        return   redirect('/Member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
           $Member=admin::where('id',$id)->first();
     return view('admin.Member.show',compact('Member'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
           $Member=admin::where('id',$id)->first();
            

     return view('admin.Member.edit',compact('Member'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

         $data = $this->validate(\request(),
            [
                
                'Membership_No'      => 'sometimes|nullable',
                'Quadruple_name'      => 'sometimes|nullable',
                'genderType'      => 'sometimes|nullable',
                 'date_of_birth'      => 'sometimes|nullable',
                'Place_of_birth'      => 'sometimes|nullable',
                'marital_status'      => 'sometimes|nullable',
                'residence'      => 'sometimes|nullable',
                'director'      => 'sometimes|nullable',
                'Neighborhood_village_street'      => 'sometimes|nullable',
                'constituency'      => 'sometimes|nullable',
                'The_electoral_center'      => 'sometimes|nullable',
                'Electoral_card_number'      => 'sometimes|nullable',
                'Educational_Qualification'      => 'sometimes|nullable',
                'where_to_get_it'      => 'sometimes|nullable',
                'received_date'      => 'sometimes|nullable',
                'Job_profession'      => 'sometimes|nullable',
                'work_address'      => 'sometimes|nullable',
           
                'house_number'      => 'sometimes|nullable',
                'talents_and_abilities'      => 'sometimes|nullable',
                'Facebook_account'      => 'sometimes|nullable',
                'Identification_type'      => 'sometimes|nullable',
                'Identification_number'      => 'sometimes|nullable',
                'date_of_issue_Identification_number'      => 'sometimes|nullable',
                'Place_of_issue_of_Identification_number'      => 'sometimes|nullable',
                'Have_you_ever_joined_any_previous_political_party'      => 'sometimes|nullable',
                'Have_you_ever_run_for_a_council'      => 'sometimes|nullable',
                'Have_you_ever_won_a_board'      => 'sometimes|nullable',
                'about_party'      => 'sometimes|nullable',
                'about_a_circle'      => 'sometimes|nullable',
                'about_a_year'      => 'sometimes|nullable',
                'Have_you_ever_been_involved_in_public_volunteer_work'      => 'sometimes|nullable',
                'The_Secretariat_in_which_you_wish_to_work'      => 'sometimes|nullable',
              
                'password'      => 'sometimes|nullable',
                'photo'      =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     
                 
            ],[],[
                'Membership_No'      => trans('trans.Membership_No'),
                'Quadruple_name'      => trans('trans.Quadruple_name'),
                'genderType'      => trans('trans.genderType'),
                'date_of_birth'      => trans('trans.date_of_birth'),
                'Place_of_birth'      => trans('trans.Place_of_birth'),
                'marital_status'      => trans('trans.marital_status'),
                'residence'      => trans('trans.residence'),
                'director'      => trans('trans.director'),
                'Neighborhood_village_street'      => trans('trans.Neighborhood_village_street'),
                'constituency'      => trans('trans.constituency'),
                'The_electoral_center'      => trans('trans.The_electoral_center'),
                'Electoral_card_number'      => trans('trans.Electoral_card_number'),
                'Educational_Qualification'      => trans('trans.Educational_Qualification'),
                'where_to_get_it'      => trans('trans.where_to_get_it'),
                'received_date'      => trans('trans.received_date'),
                'Job_profession'      => trans('trans.Job_profession'),
                'work_address'      => trans('trans.work_address'),
                'phone'      => trans('trans.phone'),
                'house_number'      => trans('trans.house_number'),
                'talents_and_abilities'      => trans('trans.talents_and_abilities'),
                'Facebook_account'      => trans('trans.Facebook_account'),
                'Identification_type'      => trans('trans.Identification_type'),
                'Identification_number'      => trans('trans.Identification_number'),
                   'Place_of_issue_of_Identification_number'      => trans('trans.Place_of_issue_of_Identification_number'),
                 'date_of_issue_Identification_number'      => trans('trans.date_of_issue_Identification_number'),
                'Have_you_ever_joined_any_previous_political_party'      => trans('trans.Have_you_ever_joined_any_previous_political_party'),
                'Have_you_ever_run_for_a_council'      => trans('trans.Have_you_ever_run_for_a_council'),
                'Have_you_ever_won_a_board'      => trans('trans.Have_you_ever_won_a_board'),
                'about_party'      => trans('trans.about_party'),
                'about_a_circle'      => trans('trans.about_a_circle'),
                'about_a_year'      => trans('trans.about_a_year'),
                'Have_you_ever_been_involved_in_public_volunteer_work'      => trans('trans.Have_you_ever_been_involved_in_public_volunteer_work'),
                'The_Secretariat_in_which_you_wish_to_work'      => trans('trans.The_Secretariat_in_which_you_wish_to_work'),
                'email'      => trans('trans.email'),
                'password'      => trans('trans.password'),
                'photo'      => trans('trans.photo'),



            ]);

                 if ($request->photo) 
               {

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('/images/Member'), $imageName);
            $data['photo'] = 'images/Member/'.$imageName;
           }      
                       $data['password']=Hash::make($request->password);
      $data['type']='Member';
           admin::where('id',$request->id)->update($data);

  
                    
                 session()->flash('success', trans('trans.updatSuccess'));
        return   back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          $Member=admin::where('id',$id)->first();
         if ($Member->photo) 
         {
             if (file_exists($Member->photo)) 
             {
                  unlink($Member->photo);
             }
                   
         }
                  $Member->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/Member');
    }
}
