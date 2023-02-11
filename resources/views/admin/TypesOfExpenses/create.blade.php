

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
                                    <a href="{{url('/')}}/TypesOfExpenses">{{trans('trans.TypesOfExpenses')}}</a>
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
                  <form role="form" action="{{url('/')}}/TypesOfExpenses" method="POST" enctype="multipart/form-data">
                    @csrf


          <div class="row">
                <div class="form-group col-md-6">
                               <label class="control-label">{{trans('trans.name_ar')}}</label>
              <input type="text"  value="{{old('name_ar')}}" placeholder="{{trans('trans.name_ar')}}" class="form-control"    name="name_ar"  required=""/>
          </div>

          <div class="form-group col-md-6">
            <label class="control-label">{{trans('trans.name_en')}}</label>
<input type="text"  value="{{old('name_en')}}" placeholder="{{trans('trans.name_en')}}" class="form-control"    name="name_en"   />
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

