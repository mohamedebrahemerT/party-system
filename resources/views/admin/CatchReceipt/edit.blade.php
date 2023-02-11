

@extends('admin.index')

@section('content')

  
 


                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="{{url('/')}}/CatchReceipt">{{trans('trans.CatchReceipt')}}</a>
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
                  <form role="form" action="{{url('/')}}/CatchReceipt/{{$CatchReceipt->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}

 					<input type="hidden" name="id" value="{{$CatchReceipt->id}}">


 				

           <div class="col-md-12">

                  <div class="row">

                     
 

         

        <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.customer_name')}}</label>
              <input type="text" placeholder="{{trans('trans.customer_name')}}" class="form-control"    name="customer_name" value="{{$CatchReceipt->customer_name}}" required=""/> 
          </div>


     <div class="form-group col-md-2">
                               <label class="control-label">{{trans('trans.price')}}</label>
              <input type="text" placeholder="{{trans('trans.price')}}" class="form-control txt"    name="price"  value="{{$CatchReceipt->price}}" required=""/> 
          </div>


    

 
            <div class="form-group col-md-2 ItemNumber">
                               <label class="control-label">{{trans('trans.Quantity')}}</label>

                   <input  type="number" placeholder="{{trans('trans.ItemNumber')}}" class="form-control txt"    name="Quantity"   value="{{$CatchReceipt->Quantity}}"/> 
              
          </div>
 
<div class="form-group col-md-2">
                               <label class="control-label">{{trans('trans.Total')}}</label>
  

                   <input type="number" placeholder="{{trans('trans.Total')}}" class="form-control"   value="{{$CatchReceipt->total}}"  name="total"  required="" id="mytext" /> 
              
          </div>

           <div class="form-group col-md-12">
                                    <label class="control-label">{{trans('trans.Statement')}}</label>
  <textarea class="form-control" name="Statement" class="form-control Statement">
    {{$CatchReceipt->Statement}}
                   
              </textarea>
          </div>





 
       
 
 
           

 

                      
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

