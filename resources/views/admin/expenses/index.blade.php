

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
                                    <a href="{{url('/')}}/expenses">{{trans('trans.expenses')}}</a>
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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.expenses')}}</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                                                        <a href="{{url('/')}}/expenses/create" id="sample_editable_1_new" class="btn sbold green"> {{trans('trans.Add New')}}
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>




                                                  
                                      <th> {{trans('trans.TypesOfExpenses_id')}}  </th>
                                      <th> {{trans('trans.value')}}  </th>
                                      <th> {{trans('trans.desc')}}  </th>
                                                    <th>{{trans('trans.Actions')}}  </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	@foreach($expenses as $shift)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    

                                                     <td>
                                                        
                                                       @if (app()->getLocale() == 'ar')
                                                         {{$shift->TypesOfExpense->name_ar}}
                                                         @else
                                                         {{$shift->TypesOfExpense->name_en}}
                                                         @endif  
                                                    </td>

                                                       <td>
                                                        {{$shift->value}}
                                                    </td>
                                                    <td>
                                                        {!! $shift->desc !!}
                                                    </td>

                                                    



                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> {{trans('trans.Actions')}}
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                 <a href="{{url('/')}}/expenses/{{$shift->id}}/edit">
                                     <i class="icon-docs"></i>{{trans('trans.edit')}} </a>
                                                                </li>

                                                                 <li>
                                                 <a href="{{url('/')}}/expenses/{{$shift->id}}/destroy ">
                                     <i class="icon-docs"></i>{{trans('trans.delete')}} </a>
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

