

@extends('admin.index')

@section('content')

    @push('style')
    
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
                                    
                                    <div class="portlet-body">
                                         
                                   <div class="invoice">
                            <div class="row invoice-logo">
                                <div class="col-xs-4 invoice-logo-space">
                                    <img  src="{{url('/')}}/{{setting()->logo}}" class="img-responsive" style="height: 83px;" alt=""> </div>

                                     <div class="col-xs-4 invoice-logo-space">
                                    <img  src="{{url('/')}}/{{$Member->photo}}" class="img-responsive" style="height: 83px;" alt=""> </div>
                                <div class="col-xs-4">
                                    <p> <span class="muted">{{trans('trans.ID')}}</span> {{ $Member->id}}# /<span class="muted">{{trans('trans.membersince')}}</span> {{ $Member->created_at}}
                                       
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-4">
                                    <h4>{{trans('trans.member')}}:</h4>
                                    <ul class="list-unstyled">
                                        <li>{{trans('trans.Quadruple_name')}}:{{$Member->Quadruple_name}} </li>
                                        <li>
                                            {{trans('trans.genderType')}}:
              @if ($Member->genderType == "male")
                     {{trans('trans.male')}} 
              @endif

               @if ($Member->genderType == "female")
                     {{trans('trans.female')}} 
              @endif

               @if ($Member->genderType == "other")
                     {{trans('trans.other')}} 
              @endif
                                         </li>
                                        <li>
                                            <label class="control-label">{{trans('trans.date_of_birth')}}:</label>
                                            {{$Member->date_of_birth}}
                                        </li>

                                        <li>
                                            <label class="control-label">{{trans('trans.email')}}:</label>
                                            {{$Member->email}}
                                        </li>

                                             
                                                

                                       
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <h4>{{trans('trans.address')}}:</h4>
                                    <ul class="list-unstyled">
                                         <li>
                                            {{trans('trans.Place_of_birth')}}:
              @if ($Member->Place_of_birth == "center")
                     {{trans('trans.center')}} 
              @endif

             
              @if ($Member->Place_of_birth == "City")
                     {{trans('trans.City')}} 
              @endif


              @if ($Member->Place_of_birth == "governorate")
                     {{trans('trans.governorate')}} 
              @endif

               
                                         </li>

                                        <li>
                                         <label class="control-label">{{trans('trans.residence')}}:</label>
                                         {{$Member->residence}} 
                                        </li>

                                         <li>
                                         <label class="control-label">{{trans('trans.director')}}:</label>
                                         {{$Member->director}} 
                                        </li>
                                           <li> <label class="control-label">{{trans('trans.house_number')}}</label>:{{$Member->house_number}} 
                                            </li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 invoice-payment">
                                    <h4>{{trans('trans.electiondata')}}:</h4>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>    {{trans('trans.marital_status')}} :</strong> {{$Member->marital_status}}</li>
                                        <li>
            @foreach($Member->other_data_R()->get() as $data)

                                            <li>
                                            <strong>        {!! Form::label('input_key',trans('trans.input_key')) !!} :</strong>{{$data->input_key}}</li>
            @endforeach



                                        <li>


                                            <strong>{{trans('trans.Neighborhood_village_street')}}:</strong> {{$Member->Neighborhood_village_street}} </li>
                                        <li>
                                            <strong>{{trans('trans.constituency')}}:</strong> {{$Member->constituency}} </li>
                                        <li>
                                            <strong>{{trans('trans.The_electoral_center')}}:</strong>{{$Member->The_electoral_center}} </li>
                                        <li>
                                            <strong>{{trans('trans.Electoral_card_number')}}:</strong> {{$Member->Electoral_card_number}} </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                 <div class="col-xs-4">
                                    <h4>{{trans('trans.Educational_Qualification')}}:</h4>
                                    <ul class="list-unstyled">

                                        <li> <label class="control-label">{{trans('trans.Educational_Qualification')}}</label>:{{$Member->Educational_Qualification}} </li>
                                       

                                            <li> <label class="control-label">{{trans('trans.where_to_get_it')}}</label>:{{$Member->where_to_get_it}} 
                                            </li>

                                            <li> <label class="control-label">{{trans('trans.received_date')}}</label>:{{$Member->received_date}} 
                                            </li>
                                       
                                           
                                       
                                    </ul>
                                </div>

                                <div class="col-xs-4">
                                    <h4>{{trans('trans.Job_profession')}}:</h4>
                                    <ul class="list-unstyled">

                                        <li> <label class="control-label">{{trans('trans.Job_profession')}}</label>:{{$Member->Job_profession}} </li>
                                       

                                            <li> <label class="control-label">{{trans('trans.work_address')}}</label>:{{$Member->work_address}} 
                                            </li>

                                            <li> <label class="control-label">{{trans('trans.phone')}}</label>:{{$Member->phone}} 
                                            </li>

                                      
                                           
                                       
                                    </ul>
                                </div>

                                 <div class="col-xs-4">
                                    <h4>{{trans('trans.Syndicate')}}:</h4>
                                    <ul class="list-unstyled">

                                        <li> <label class="control-label">{{trans('trans.GeneralSyndicate')}}</label>:{{$Member->GeneralSyndicate}} </li>
                                       
                        <li> <label class="control-label">{{trans('trans.subguild')}}</label>:{{$Member->subguild}} </li>
 

                          <li> <label class="control-label">{{trans('trans.club')}}</label>:{{$Member->club}} </li>
                                           
                                       
                                    </ul>
                                </div>
                                
                            </div>

                            <div class="row">
                                

                                     <div class="col-xs-4">
                                    <h4>{{trans('trans.iddat')}}:</h4>
                                    <ul class="list-unstyled">

                                        <li> <label class="control-label">{{trans('trans.Identification_type')}}</label>:{{$Member->Identification_type}} </li>

                   <li> <label class="control-label">{{trans('trans.Identification_number')}}</label>:{{$Member->Identification_number}} </li>

                     <li> <label class="control-label">{{trans('trans.Place_of_issue_of_Identification_number')}}</label>:{{$Member->Place_of_issue_of_Identification_number}} </li>

                      <li> <label class="control-label">{{trans('trans.date_of_issue_Identification_number')}}</label>:{{$Member->date_of_issue_Identification_number}} </li>
                                    
                                       
                                    </ul>
                                </div>

                                    <div class="col-xs-4">
                                    <h4>{{trans('trans.talents_and_abilities')}}:</h4>
                                    <ul class="list-unstyled">
 
   <li> <label class="control-label">{{trans('trans.talents_and_abilities')}}</label>:{{$Member->talents_and_abilities}} </li>
                                       
                                    </ul>
                                </div>

                                 <div class="col-xs-4">
                                    <h4>{{trans('trans.Facebook_account')}}:</h4>
                                    <ul class="list-unstyled">

                                        <li> <label class="control-label">{{trans('trans.Facebook_account')}}</label>:{{$Member->Facebook_account}} </li>

                    
                                       
                                    </ul>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> {{trans('trans.Have_you_ever_joined_any_previous_political_party')}} </th>
                                                <th class="hidden-xs"> {{trans('trans.Have_you_ever_run_for_a_council')}} </th>
                                                <th class="hidden-xs"> {{trans('trans.Have_you_ever_won_a_board')}} </th>


                                                <th> {{trans('trans.about_party')}} </th>
                                                <th class="hidden-xs"> {{trans('trans.about_a_circle')}} </th>
                                                <th class="hidden-xs"> {{trans('trans.about_a_year')}} </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                               <td>  
        @if ($Member->Have_you_ever_joined_any_previous_political_party == "yes")
                {{trans('trans.yes')}} 
              @endif 

               @if ($Member->Have_you_ever_joined_any_previous_political_party == "no")
                {{trans('trans.no')}} 
              @endif 
          </td>
                                                <td class="hidden-xs">
  @if ($Member->Have_you_ever_run_for_a_council == "deputies")
                {{trans('trans.deputies')}} 
              @endif 

               @if ($Member->Have_you_ever_run_for_a_council == "no")
                {{trans('trans.no')}} 
              @endif 

               @if ($Member->Have_you_ever_run_for_a_council == "local")
                {{trans('trans.local')}} 
              @endif 
                                                 </td>
                                                <td class="hidden-xs"> 

 @if ($Member->Have_you_ever_won_a_board == "deputies")
                {{trans('trans.deputies')}} 
              @endif 

               @if ($Member->Have_you_ever_won_a_board == "no")
                {{trans('trans.no')}} 
              @endif 

               @if ($Member->Have_you_ever_won_a_board == "local")
                {{trans('trans.local')}} 
              @endif 
                                                 </td>

                                                  <td>  
      {{$Member->about_party}}
          </td>

               <td>  
      {{$Member->about_a_circle}}
          </td>

               <td>  
      {{$Member->about_a_year}}
          </td>
                                               
                                            </tr>

                                        </tbody>
                                    </table>

  

                                      <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> {{trans('trans.Have_you_ever_been_involved_in_public_volunteer_work')}} </th>
                                                <th class="hidden-xs"> {{trans('trans.The_Secretariat_in_which_you_wish_to_work')}} </th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 2</td>
                                               <td>  
    @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "union")
              {{trans('trans.union')}} 
              @endif

                  @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "charity")
              {{trans('trans.charity')}} 
              @endif

                  @if ($Member->Have_you_ever_been_involved_in_public_volunteer_work == "institution")
              {{trans('trans.institution')}} 
              @endif


          </td>

               <td>  
      {{$Member->The_Secretariat_in_which_you_wish_to_work}}
          </td>

                
                                               
                                               
                                            </tr>

                                        </tbody>
                                    </table>



                                       <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>توقيع  رئيس الحزب للتنظيم والعضوية   </th>
                                               
                                                  <th>توقيع  رئيس الحزب  </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> ...............................................................</td>
                                                <td> ...................................</td>
                                                
                                              

          
                                               
                                               
                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                           
                                <div class="col-xs-8 invoice-block">
                                    
                                    <br>
                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> {{trans('trans.print')}}
                                        <i class="fa fa-print"></i>
                                    </a>
                                     
                                </div>
                            </div>
                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- END CONTENT BODY -->
               

  @endsection

  