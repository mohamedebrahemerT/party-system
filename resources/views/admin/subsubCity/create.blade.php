

@extends('admin.index')

@section('content')

  
 


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
                                    <a href="{{url('/')}}/subsubCity">{{trans('trans.subsubCity')}}</a>
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
                  <form role="form" action="{{url('/')}}/subsubCity" method="POST" enctype="multipart/form-data">
                    @csrf
                   
 




                     <div class="form-group">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control"    name="name"  required=""/> 
          </div>

           <div class="form-group">
                               <label class="control-label">{{trans('trans.code')}}</label>
              <input type="text" placeholder="{{trans('trans.code')}}" class="form-control"    name="code"  required=""/> 
          </div>

           <div class="form-group">
                            <label for="city">{{trans('trans.subCity_id')}}</label>


                              <select name="subCity_id" class="form-control">
                    @foreach(App\Models\subCity::get() as $subCity)
                    <option 

@if (old('subCity_id') == $subCity->id)
              selected
              @endif

                    value="{{$subCity->id}}">
                      
       {{$subCity->name}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
                        </div>
     
 <div class="form-group">
                            <label for="city">{{trans('trans.city_id')}}</label>


                              <select name="city_id" class="form-control">
                    @foreach(App\Models\City::get() as $City)
                    <option 

@if (old('city_id') == $City->id)
              selected
              @endif

                    value="{{$City->id}}">
                      
       {{$City->name_ar}} 
                               
                                 
                    </option>


                    @endforeach
                    
                </select>
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

