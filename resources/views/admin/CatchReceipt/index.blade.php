



@extends('admin.index')



@section('content')



    @push('style')

    

    @endpush



 





                        <!-- END THEME PANEL -->

                        <!-- BEGIN PAGE BAR -->

                        <div class="page-bar">

                            <ul class="page-breadcrumb">

                                <li>

                                                 <a href="{{url('/')}}">{{trans('trans.Home')}}</a>

                                    <i class="fa fa-circle"></i>

                                </li>

                                <li>

                                    <a href="{{url('/')}}/adminShowCities">{{trans('trans.CatchReceipt')}}</a>

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

                                            <span class="caption-subject bold uppercase"> {{trans('trans.CatchReceipt')}}</span>

                                        </div>

                                         

                                    </div>

                                    <div class="portlet-body">

                                        <div class="table-toolbar">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="btn-group">

                 <a id="sample_editable_1_new" class="btn sbold green" href="{{url('/')}}/CatchReceipt/create"> {{trans('trans.Add New')}}

                                                            <i class="fa fa-plus"></i>

                                                        </a>

                                                    </div>

                                                </div>

                                                

                                            </div>

                                        </div >

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                                            <thead>

                                                <tr>

                                                    <th>

                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">

                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />

                                                            <span></span>

                                                        </label>

                                                    </th>

 

                                                    <th> {{trans('trans.customer_name')}}  </th>

                                                    

                                                    <th> 

                                            {{trans('trans.Statement')}}  

                                                </th>



                                                 <th> 

                                            {{trans('trans.Quantity')}}  

                                                </th>



                                                 <th> 

                                            {{trans('trans.price')}}  

                                                </th>



                                                <th> 

                                            {{trans('trans.total')}}  

                                                </th>

                                                <th> 

                                            {{trans('trans.vate')}}  

                                                </th>



                                                  <th> 

                                            {{trans('trans.total_afetr_vate')}}  

                                                </th>

                                                     

                                                     

                                                     



                                                    <th>{{trans('trans.Actions')}}  </th>

                                                </tr>

                                            </thead>

                                            <tbody>



                               @foreach($CatchReceipt as $in)

                                                <tr class="odd gradeX">

                                                    <td>

                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">

                                                            <input type="checkbox" class="checkboxes" value="1" />

                                                            <span></span>

                                                        </label>

                                                    </td>

                                                    <td>

                                                          {{$in->customer_name}} 

                                                      

                                                       </td>



                                                        <td>

                                                          {{$in->Statement}} 

                                                      

                                                       </td>

                                                       <td>

                                                          {{$in->Quantity}} 

                                                      

                                                       </td>

                                                        <td>

                                                          {{$in->price}} 

                                                      

                                                       </td>

                                                        <td>

                                                          {{$in->total}} 

                                                      

                                                       </td>

                                                        <td>

                                                          {{$in->vate}} 

                                                      

                                                       </td>

                                                       <td>

                                                          {{$in->total_afetr_vate}} 

                                                      

                                                       </td>



                                                      

                                                    









                                                    

                                                    



                                                     

                                                     

                                                    <td>

                                                        <div class="btn-group">

                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}

                                                                <i class="fa fa-angle-down"></i>

                                                            </button>

                                                            <ul class="dropdown-menu pull-left" role="menu">
 

                                                              

 <li>

                     <a href="{{url('/')}}/CatchReceiptprint/{{$in->id}}">

                                                                        <i class="icon-docs"></i> 

                                                    {{trans('trans.print')}}

                                                                </a>

                                                                </li>



                                                                <li>

                     <a href="{{url('/')}}/showCatchReceipt/{{$in->reference_no}}">

                                                                        <i class="icon-docs"></i> 

                                                    {{trans('trans.show')}}

                                                                </a>

                                                                </li>



                                                                

                                                                  

                                                                <li>

                     <a href="{{url('/')}}/CatchReceipt/{{$in->id}}/edit">

                                                                        <i class="icon-docs"></i> 

                                                    {{trans('trans.edit')}}

                                                                </a>

                                                                </li>

                                                                <li>

                                              <a href="{{url('/')}}/CatchReceipt/{{$in->id}}/destroy">

                                                                        <i class="icon-tag"></i>

                                     {{trans('trans.delete')}}

                                                                         </a>

                                                                </li>

                                                                

                                                               

                                                                

                                                            </ul>

                                                        </div>

                                                    </td>

                                                </tr>

                                                  @endforeach

                                            </tbody>

                                        </table>

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



  