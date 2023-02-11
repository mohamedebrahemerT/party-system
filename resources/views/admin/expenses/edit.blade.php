

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
                                            <span class="caption-subject bold uppercase"> {{trans('trans.create')}}</span>
                                        </div>

                                    </div>
                                   <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                 <form role="form" action="{{url('/')}}/expenses/{{$expenses->id}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{ method_field('PATCH') }}

                   <input type="hidden" name="id" value="{{$expenses->id}}">


            <div class="row">
              
  

            <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.TypesOfExpenses_id')}}</label>

                <select name="TypesOfExpenses_id" class="form-control" >
                    @foreach(App\Models\TypesOfExpenses::get() as $TypesOfExpenses)

                      
                                       

                    <option  @if ($expenses->TypesOfExpenses_id == $TypesOfExpenses->id)
                    selected
                    @endif value="{{$TypesOfExpenses->id}}">

                              @if (app()->getLocale() == 'ar')
                                  {{$TypesOfExpenses->name_ar}}  
                                                        @else
                               {{$TypesOfExpenses->name_en}} 
                                                        @endif
                                                         

                    </option>
                    @endforeach

                </select>
          </div>

                <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.value')}}</label>
              <input type="text"  value="{{$expenses->value}}" placeholder="{{trans('trans.value')}}" class="form-control"    name="value"  required=""/>
          </div>

           <div class="form-group col-md-12">
                               <label class="control-label">{{trans('trans.desc')}}</label>
              <input type="text"  value="{{$expenses->desc}}" placeholder="{{trans('trans.desc')}}" class="form-control"    name="desc"  required=""/>
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

