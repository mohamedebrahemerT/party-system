

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

            
@endpush


@push('js')
<script type="text/javascript">
 $(document).ready(function() {
  
  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep(old('parent')) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : false
    },
    "plugins" : [ "wholerow" ]
  });

});

 $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.parent_id').val(r.join(', '));
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.create')}}</span>
                                        </div>
                                         
                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                  <form role="form" action="{{url('/')}}/Member" method="POST" enctype="multipart/form-data">
                    @csrf
                  
   







<div class="row">




                     <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Membership_No')}}</label>
              <input type="text" placeholder="{{trans('trans.Membership_No')}}" class="form-control"    name="Membership_No" value="{{old('Membership_No')}}"  required /> 
          </div>

             <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Quadruple_name')}}</label>
              <input type="text" placeholder="{{trans('trans.Quadruple_name')}}" class="form-control"    name="Quadruple_name" value="{{old('Quadruple_name')}}" required /> 
          </div>




 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.genderType')}}</label>

                <select name="genderType" class="form-control" >
                   
                    <option 

 @if (old('genderType') == "male")
              selected
              @endif
                    value="male">
                    {{trans('trans.male')}}              
                    </option>

                     <option 

 @if (old('genderType') == "female")
              selected
              @endif
                       value="female">
                    {{trans('trans.female')}}              
                    </option>

                      <option 

 @if (old('genderType') == "other")
              selected
              @endif
                       value="other">
                    {{trans('trans.other')}}              
                    </option>

                   
                    
                </select>
          </div>

           


           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.date_of_birth')}}</label>
              <input type="date" placeholder="{{trans('trans.date_of_birth')}}" class="form-control"    name="date_of_birth" value="{{old('date_of_birth')}}"  required /> 
          </div>
          
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Place_of_birth')}}</label>
              <input type="text" placeholder="{{trans('trans.Place_of_birth')}}" class="form-control"    name="Place_of_birth" value="{{old('Place_of_birth')}}"  /> 
          </div>
          
        
             <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.marital_status')}}</label>
              <input type="text" placeholder="{{trans('trans.marital_status')}}" class="form-control"    name="marital_status" value="{{old('marital_status')}}"  /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.residence')}}</label>
              <input type="text" placeholder="{{trans('trans.residence')}}" class="form-control"    name="residence" value="{{old('residence')}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.director')}}</label>
              <input type="text" placeholder="{{trans('trans.director')}}" class="form-control"    name="director" value="{{old('director')}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Neighborhood_village_street')}}</label>
              <input type="text" placeholder="{{trans('trans.Neighborhood_village_street')}}" class="form-control" value="{{old('Neighborhood_village_street')}}"   name="Neighborhood_village_street"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.constituency')}}</label>
              <input type="text" placeholder="{{trans('trans.constituency')}}" class="form-control"    name="constituency"  value="{{old('constituency')}}" /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.The_electoral_center')}}</label>
              <input type="text" placeholder="{{trans('trans.The_electoral_center')}}" class="form-control" value="{{old('The_electoral_center')}}"    name="The_electoral_center"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Electoral_card_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Electoral_card_number')}}" class="form-control"  value="{{old('Electoral_card_number')}}"   name="Electoral_card_number"  /> 
          </div>


 <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Educational_Qualification')}}</label>
              <input type="text" placeholder="{{trans('trans.Educational_Qualification')}}" class="form-control"   value="{{old('Educational_Qualification')}}"   name="Educational_Qualification"  /> 
          </div>
           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.where_to_get_it')}}</label>
              <input type="text" placeholder="{{trans('trans.where_to_get_it')}}" class="form-control"  value="{{old('where_to_get_it')}}"  name="where_to_get_it"  /> 
          </div>
           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.received_date')}}</label>
              <input type="date" placeholder="{{trans('trans.received_date')}}" class="form-control"    name="received_date" value="{{old('received_date')}}"  /> 
          </div>



           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Job_profession')}}</label>
              <input type="text" placeholder="{{trans('trans.Job_profession')}}" class="form-control"  value="{{old('Job_profession')}}"  name="Job_profession"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.work_address')}}</label>
              <input type="text" placeholder="{{trans('trans.work_address')}}" class="form-control"    name="work_address" value="{{old('work_address')}}"  /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.phone')}}</label>
              <input type="text" placeholder="{{trans('trans.phone')}}" class="form-control"    name="phone"  value="{{old('phone')}}" /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.house_number')}}</label>
              <input type="text" placeholder="{{trans('trans.house_number')}}" class="form-control"    name="house_number"  value="{{old('house_number')}}" /> 
          </div>

      

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Facebook_account')}}</label>
              <input type="text" placeholder="{{trans('trans.Facebook_account')}}" class="form-control"  value="{{old('Facebook_account')}}"  name="Facebook_account"  /> 
          </div>

               <div class="form-group col-md-12">
                               <label class="control-label">{{trans('trans.talents_and_abilities')}}</label>
              <textarea type="text" placeholder="{{trans('trans.talents_and_abilities')}}" class="form-control"  value="{{old('talents_and_abilities')}}"  name="talents_and_abilities"  /> 

              {{old('talents_and_abilities')}}

          </textarea>


          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Identification_type')}}</label>
              <input type="text" placeholder="{{trans('trans.Identification_type')}}" class="form-control" value="{{old('Identification_type')}}"   name="Identification_type"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Identification_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Identification_number')}}" class="form-control"  value="{{old('Identification_number')}}"  name="Identification_number"  /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Place_of_issue_of_Identification_number')}}</label>
              <input type="text" placeholder="{{trans('trans.Place_of_issue_of_Identification_number')}}" class="form-control"    name="Place_of_issue_of_Identification_number" value="{{old('Place_of_issue_of_Identification_number')}}" /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.date_of_issue_Identification_number')}}</label>
              <input type="date" placeholder="{{trans('trans.date_of_issue_Identification_number')}}" class="form-control"    name="date_of_issue_Identification_number"  value="{{old('date_of_issue_Identification_number')}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_joined_any_previous_political_party')}}</label>

                <select name="Have_you_ever_joined_any_previous_political_party" class="form-control"  >
                   
                    <option 

 @if (old('Have_you_ever_joined_any_previous_political_party') == "yes")
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

 @if (old('Have_you_ever_run_for_a_council') == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                   
                    <option 

 @if (old('Have_you_ever_run_for_a_council') == "deputies")
              selected
              @endif
                    value="deputies">
                    {{trans('trans.deputies')}}              
                    </option>

                     <option 

 @if (old('Have_you_ever_run_for_a_council') == "local")
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

 @if (old('Have_you_ever_won_a_board') == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                   
                    <option 

 @if (old('Have_you_ever_won_a_board') == "deputies")
              selected
              @endif
                    value="deputies">
                    {{trans('trans.deputies')}}              
                    </option>

                     <option 

 @if (old('Have_you_ever_won_a_board') == "local")
              selected
              @endif
                       value="local">
                    {{trans('trans.local')}}              
                    </option>

                   
                    
                </select>
          </div>

         

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_party')}}</label>
              <input type="text" placeholder="{{trans('trans.about_party')}}" class="form-control"    name="about_party" value="{{old('about_party')}}"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_a_circle')}}</label>
              <input type="text" placeholder="{{trans('trans.about_a_circle')}}" class="form-control"   value="{{old('about_a_circle')}}"  name="about_a_circle"  /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.about_a_year')}}</label>
              <input type="text" placeholder="{{trans('trans.about_a_year')}}" class="form-control"    name="about_a_year"  value="{{old('about_a_year')}}" /> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.Have_you_ever_been_involved_in_public_volunteer_work')}}</label>

                <select name="Have_you_ever_been_involved_in_public_volunteer_work" class="form-control"  >
                     <option 

 @if (old('Have_you_ever_been_involved_in_public_volunteer_work') == "no")
              selected
              @endif
                       value="no">
                    {{trans('trans.no')}}              
                    </option>

                    <option 

 @if (old('Have_you_ever_been_involved_in_public_volunteer_work') == "Association")
              selected
              @endif
                    value="Association">
                    {{trans('trans.Association')}}              
                    </option>

                     <option 

 @if (old('Have_you_ever_been_involved_in_public_volunteer_work') == "union")
              selected
              @endif
                       value="union">
                    {{trans('trans.union')}}              
                    </option>

                     <option 

 @if (old('Have_you_ever_been_involved_in_public_volunteer_work') == "charity")
              selected
              @endif
                       value="charity">
                    {{trans('trans.charity')}}              
                    </option>

                        <option 

 @if (old('Have_you_ever_been_involved_in_public_volunteer_work') == "institution")
              selected
              @endif
                       value="institution">
                    {{trans('trans.institution')}}              
                    </option>


                   
                    
                </select>
          </div>
 

 
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.The_Secretariat_in_which_you_wish_to_work')}}</label>
              <input type="text" placeholder="{{trans('trans.The_Secretariat_in_which_you_wish_to_work')}}" class="form-control"    name="The_Secretariat_in_which_you_wish_to_work" value="{{old('The_Secretariat_in_which_you_wish_to_work')}}"  /> 
          </div>


  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.email')}}</label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"    name="email" value="{{old('email')}}" required /> 
          </div>


  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.password')}}</label>
              <input type="password" placeholder="{{trans('trans.password')}}" class="form-control"    name="password"  /> 
          </div>
  <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.photo')}}</label>
              <input type="file" placeholder="{{trans('trans.photo')}}" class="form-control"    name="photo"   /> 
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

