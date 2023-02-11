

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
                                    <a href="{{url('/')}}/suppliers">{{trans('trans.suppliers')}}</a>
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
                  <form role="form" action="{{url('/')}}/suppliers/{{$suppliers->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}

 					<input type="hidden" name="id" value="{{$suppliers->id}}">


 			   <div class="row">
                         <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.name')}}</label>
              <input type="text" placeholder="{{trans('trans.name')}}" class="form-control" value="{{$suppliers->name}}"   name="name"  required=""/> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.phone')}}  </label>
              <input type="number" placeholder="{{trans('trans.phone')}}" class="form-control"  value="{{$suppliers->phone}}"  name="phone"  required=""/> 
          </div>

            <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.email')}}  </label>
              <input type="email" placeholder="{{trans('trans.email')}}" class="form-control"  value="{{$suppliers->email}}"   name="email"  required=""/> 
          </div>

            <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.address')}}  </label>
              <input type="text" placeholder="{{trans('trans.address')}}" class="form-control"   value="{{$suppliers->address}}"  name="address"  required=""/> 
          </div>

           <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.image')}}  </label>
              <input type="file" placeholder="{{trans('trans.image')}}" class="form-control"    name="image"   /> 
          </div>

          <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.company_name')}}  </label>
              <input type="text" placeholder="{{trans('trans.company_name')}}" class="form-control"  value="{{$suppliers->company_name}}"   name="company_name"  required=""/> 
          </div>

            <div class="form-group col-md-3">
                               <label class="control-label">{{trans('trans.vat_number')}}  </label>
              <input type="text" placeholder="{{trans('trans.vat_number')}}" class="form-control"  value="{{$suppliers->vat_number}}"   name="vat_number"  required=""/> 
          </div>

              <div class="form-group col-md-3">

     <br>
        

               @if($suppliers->image)
                                             <img src="{{url('/')}}/{{$suppliers->image}}"  style="width:200px;height:200px">
                                              @else
                                          
                                                @endif
                    </div>
                    </div>
         

              <div class="form-group">
                <button type="submit" class="btn green-meadow">{{trans('trans.save')}}</button>
              </div >
 
           
                                                                
                                                                
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

