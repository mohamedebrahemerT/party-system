

@extends('admin.index')

@section('content')

@push('js')
 

  <script type="text/javascript">        

  $('.datetpicker').datepicker({

        rtl:true,

        language:'{{ session("lang") }}',

        todayBtn:true,

        utoclose:false,

        clearBtn:true,

  });

           </script>

            
  <script type="text/javascript">
            var x=1;
            $(document).on('click','.add_inpute',function(){

                var max_inpute=10;
                
                if (x < max_inpute) 
                {
                    //$('.div_inpute').append('<h1>test</h1>');

                    $('.div_inpute').append('<div>'+
            '<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">'+
               '{!! Form::label('input_key',trans('trans.input_key')) !!}'+
            '{!! Form::text('input_key[]','',['class'=>'form-control']) !!}'+

         '</div>'+

         '<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">'+
              ' {!! Form::label('input_value',trans('trans.input_value')) !!} '+
          '{!! Form::text('input_value[]','',['class'=>'form-control']) !!}'+
            
         '</div>'+
         '<div class="clearfix"> </div>'+
                '<br>'+
           '<a href="#" class="remove_inpute btn btn-danger"><i class="fa fa-trash"> </i>'+ '</a>'+
           '<div class="clearfix"> </div>'+
                '<br>'+
         '</div>');
                    x+=1;
         
                    return false;
                }
            });

            $(document).on('click','.remove_inpute',function(){

                $(this).parent('div').remove();
                x-=1;
                return false;
            });
         </script>

@endpush

  
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                   @if(admin()->user()->type =='admin' or admin()->user()->type =='superadmin' )
                     <a href="{{ url('/dashboard') }}"> 
                           @else
                            <a href="{{ url('/MerchantDashboard') }}">
                                            @endif{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/Member">{{trans('trans.Member')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                 
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> {{trans('trans.edit')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                  <form role="form" action="{{url('/')}}/Member/{{$Member->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}

 					<input type="hidden" name="id" value="{{$Member->id}}">

 




<div class="row">




                     <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Membership_No')}}</label>
              <input type="text" placeholder="{{trans('trans.Membership_No')}}" class="form-control"    name="Membership_No" value="{{$Member->Membership_No}}"  required /> 
          </div>

             <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Quadruple_name')}}</label>
              <input type="text" placeholder="{{trans('trans.Quadruple_name')}}" class="form-control"    name="Quadruple_name" value="{{$Member->Quadruple_name}}" required /> 
          </div>




 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.genderType')}}</label>

                <select name="genderType" class="form-control" >
                   
                    <option 

 @if ($Member->genderType == "male")
              selected
              @endif
                    value="male">
                    {{trans('trans.male')}}              
                    </option>

                     <option 

 @if ($Member->genderType == "female")
              selected
              @endif
                       value="female">
                    {{trans('trans.female')}}              
                    </option>

                      <option 

 @if ($Member->genderType == "other")
              selected
              @endif
                       value="other">
                    {{trans('trans.other')}}              
                    </option>

                   
                    
                </select>
          </div>

           


           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.date_of_birth')}}</label>
              <input type="date" placeholder="{{trans('trans.date_of_birth')}}" class="form-control"    name="date_of_birth" value="{{$Member->date_of_birth}}"  required /> 
          </div>
          
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Place_of_birth')}}</label>

                <select name="Place_of_birth" class="form-control" >
                   
                      <option 

 @if ($Member->Place_of_birth == "center")
              selected
              @endif
                    value="center">
                    {{trans('trans.center')}}              
                    </option>

                      <option 

 @if ($Member->Place_of_birth == "City")
              selected
              @endif
                    value="City">
                    {{trans('trans.City')}}              
                    </option>

                     <option 

 @if ($Member->Place_of_birth == "governorate")
              selected
              @endif
                    value="governorate">
                    {{trans('trans.governorate')}}              
                    </option>

                       

                      
                   
                    
                </select>
          </div>
          
        <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.residence')}}</label>
              <input type="text" placeholder="{{trans('trans.residence')}}" class="form-control"    name="residence" value="{{$Member->residence}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.director')}}</label>
              <input type="text" placeholder="{{trans('trans.director')}}" class="form-control"    name="director" value="{{$Member->director}}"  /> 
          </div>
             <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.marital_status')}}</label>

              <input type="text" placeholder="{{trans('trans.marital_status')}}" class="form-control"    name="marital_status" value="{{$Member->marital_status}}"  /> 
  <a href="#" class="add_inpute btn btn-info"><i class="fa fa-plus"> </i> {{trans('trans.Add children')}}</a>
                <div class="clearfix"> </div>
          </div>

             <div class="div_inpute col-sm-12 col-sm-12 col-md-12 col-lg-12">
            @foreach($Member->other_data_R()->get() as $data)
         <div>
            <div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">
               {!! Form::label('input_key',trans('trans.input_key')) !!}
            {!! Form::text('input_key[]',$data->input_key,['class'=>'form-control']) !!}

         </div>

         <div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">
               {!! Form::label('input_value',trans('trans.input_value')) !!}
            {!! Form::text('input_value[]',$data->input_value,['class'=>'form-control']) !!}
            
         </div>
         <div class="clearfix"> </div>
                <br>
           <a href="#" class="remove_inpute btn btn-danger"><i class="fa fa-trash"> </i> </a>
           <div class="clearfix"> </div>
                <br>
         </div>
            
            @endforeach
         </div>

          

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Neighborhood_village_street')}}</label>
              <input type="text" placeholder="{{trans('trans.Neighborhood_village_street')}}" class="form-control" value="{{$Member->Neighborhood_village_street}}"   name="Neighborhood_village_street"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.constituency')}}</label>
              <input type="text" placeholder="{{trans('trans.constituency')}}" class="form-control"    name="constituency"  value="{{$Member->constituency}}" /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.The_electoral_center')}}</label>
              <input type="text" placeholder="{{trans('trans.The_electoral_center')}}" class="form-control" value="{{$Member->The_electoral_center}}"    name="The_electoral_center"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Electoral_card_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Electoral_card_number')}}" class="form-control" value="{{$Member->Electoral_card_number}}"   name="Electoral_card_number"  /> 
          </div>


 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Educational_Qualification')}}</label>
              <input type="text" placeholder="{{trans('trans.Educational_Qualification')}}" class="form-control"   value="{{$Member->Educational_Qualification}}"   name="Educational_Qualification"  /> 
          </div>
           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.where_to_get_it')}}</label>
              <input type="text" placeholder="{{trans('trans.where_to_get_it')}}" class="form-control"  value="{{$Member->where_to_get_it}}"  name="where_to_get_it"  /> 
          </div>
           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.received_date')}}</label>
              <input type="date" placeholder="{{trans('trans.received_date')}}" class="form-control"    name="received_date" value="{{$Member->received_date}}" /> 
          </div>



           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Job_profession')}}</label>
              <input type="text" placeholder="{{trans('trans.Job_profession')}}" class="form-control"  value="{{$Member->Job_profession}}"  name="Job_profession"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.work_address')}}</label>
              <input type="text" placeholder="{{trans('trans.work_address')}}" class="form-control"    name="work_address" value="{{$Member->work_address}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.GeneralSyndicate')}}</label>
              <input type="text" placeholder="{{trans('trans.GeneralSyndicate')}}" class="form-control"    name="GeneralSyndicate" value="{{$Member->GeneralSyndicate}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.subguild')}}</label>
              <input type="text" placeholder="{{trans('trans.subguild')}}" class="form-control"    name="subguild" value="{{$Member->subguild}}"  /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.club')}}</label>
              <input type="text" placeholder="{{trans('trans.club')}}" class="form-control"    name="club" value="{{$Member->club}}"  /> 
          </div>


          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.phone')}}</label>
              <input type="text" placeholder="{{trans('trans.phone')}}" class="form-control"    name="phone"  value="{{$Member->phone}}"/> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.house_number')}}</label>
              <input type="text" placeholder="{{trans('trans.house_number')}}" class="form-control"    name="house_number"  value="{{$Member->house_number}}" /> 
          </div>

      

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Facebook_account')}}</label>
              <input type="text" placeholder="{{trans('trans.Facebook_account')}}" class="form-control"  value="{{$Member->Facebook_account}}"  name="Facebook_account"  /> 
          </div>

               <div class="form-group col-md-12">
                               <label class="control-label">{{trans('trans.talents_and_abilities')}}</label>
              <textarea type="text" placeholder="{{trans('trans.talents_and_abilities')}}" class="form-control"     name="talents_and_abilities"  /> 

              {{$Member->talents_and_abilities}}

          </textarea>


          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Identification_type')}}</label>
              <input type="text" placeholder="{{trans('trans.Identification_type')}}" class="form-control" value="{{$Member->Identification_type}}"   name="Identification_type"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Identification_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Identification_number')}}" class="form-control"  value="{{$Member->Identification_number}}"  name="Identification_number"  /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Place_of_issue_of_Identification_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Place_of_issue_of_Identification_number')}}" class="form-control"    name="Place_of_issue_of_Identification_number" value="{{$Member->Place_of_issue_of_Identification_number}}" /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.date_of_issue_Identification_number')}}</label>
              <input type="date" placeholder="{{trans('trans.date_of_issue_Identification_number')}}" class="form-control"    name="date_of_issue_Identification_number"  value="{{$Member->date_of_issue_Identification_number}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_joined_any_previous_political_party')}}</label>

                <select name="Have_you_ever_joined_any_previous_political_party" class="form-control"  >
                   
                    <option 

 @if ($Member->Have_you_ever_joined_any_previous_political_party == "yes")
              selected
              @endif
                    value="yes">
                    {{trans('trans.yes')}}              
                    </option>

                     <option 

 @if (old('Have_you_ever_joined_any_previous_political_party') == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                   
                    
                </select>
          </div>



           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_run_for_a_council')}}</label>

                <select name="Have_you_ever_run_for_a_council" class="form-control" >
                  <option 

 @if ($Member->Have_you_ever_run_for_a_council == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                   
                    <option 

 @if ($Member->Have_you_ever_run_for_a_council == "deputies")
              selected
              @endif
                    value="deputies">
                    {{trans('trans.deputies')}}              
                    </option>

                     <option 

 @if ($Member->Have_you_ever_run_for_a_council == "local")
              selected
              @endif
                       value="local">
                    {{trans('trans.local')}}              
                    </option>

                   
                    
                </select>
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_won_a_board')}}</label>

                <select name="Have_you_ever_won_a_board" class="form-control" >
                     <option 

 @if ($Member->Have_you_ever_won_a_board == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                   
                    <option 

 @if ($Member->Have_you_ever_won_a_board == "deputies")
              selected
              @endif
                    value="deputies">
                    {{trans('trans.deputies')}}              
                    </option>

                     <option 

 @if ($Member->Have_you_ever_won_a_board == "local")
              selected
              @endif
                       value="local">
                    {{trans('trans.local')}}              
                    </option>

                   
                    
                </select>
          </div>

         

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_party')}}</label>
              <input type="text" placeholder="{{trans('trans.about_party')}}" class="form-control"    name="about_party" value="{{$Member->about_party}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_a_circle')}}</label>
              <input type="text" placeholder="{{trans('trans.about_a_circle')}}" class="form-control"  value="{{$Member->about_a_circle}}"  name="about_a_circle"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_a_year')}}</label>
              <input type="text" placeholder="{{trans('trans.about_a_year')}}" class="form-control"    name="about_a_year" value="{{$Member->about_a_year}}" /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_been_involved_in_public_volunteer_work')}}</label>

                <select name="Have_you_ever_been_involved_in_public_volunteer_work" class="form-control"  >
                     <option 

 @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work  == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                    <option 

 @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "Association")
              selected
              @endif
                    value="Association">
                    {{trans('trans.Association')}}              
                    </option>

                     <option 

 @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "union")
              selected
              @endif
                       value="union">
                    {{trans('trans.union')}}              
                    </option>

                     <option 

 @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "charity")
              selected
              @endif
                       value="charity">
                    {{trans('trans.charity')}}              
                    </option>

                        <option 

 @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "institution")
              selected
              @endif
                       value="institution">
                    {{trans('trans.institution')}}              
                    </option>


                   
                    
                </select>
          </div>
 

 
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.The_Secretariat_in_which_you_wish_to_work')}}</label>
              <input type="text" placeholder="{{trans('trans.The_Secretariat_in_which_you_wish_to_work')}}" class="form-control"    name="The_Secretariat_in_which_you_wish_to_work" value="{{$Member->The_Secretariat_in_which_you_wish_to_work}}" /> 
          </div>


  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.email')}}</label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"    name="email" value="{{$Member->email}}" required /> 
          </div>


  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.password')}}</label>
              <input type="password" placeholder="{{trans('trans.password')}}" class="form-control"    name="password"  /> 
          </div>
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.photo')}}</label>

<input type="file" placeholder="{{trans('trans.photo')}}" class="form-control" name="photo" /> 

                             
        

             
          </div>


           <div class="form-group col-md-3">
                @if($Member->photo)
                                             <img src="{{url('/')}}/{{$Member->photo}}"  style="width:200px;height:200px">
                                              @else
                                          
                                                @endif
          </div>

   </div>


          <div class="form-group">
            <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
          </div>
 
           
 
 
             
           
                                                                
                                                                
                                                            </form>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
                @push('js')
            
 
 
                @endpush

  @endsection

