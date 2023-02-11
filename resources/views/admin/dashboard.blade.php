

@extends('admin.index')

@section('content')

 


                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                <a href="{{url('/')}}">{{trans('trans.Home')}}</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>{{trans('trans.Dashboard')}}</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">{{trans('trans.Dashboard')}}
                            <small>{{trans('trans.Dashboard')}} & {{trans('trans.statistics')}} </small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\admin::where('type','Member')->count()}}">{{App\Models\admin::where('type','Member')->count()}}</span>
                                              
                                            </h3>
                                            <small>{{trans('trans.members')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                  <span data-counter="counterup" data-value="{{App\Models\Department::count()}}">{{App\Models\Department::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.Categories')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{App\Models\suppliers::count()}}">{{App\Models\suppliers::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.suppliers')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="{{App\Models\invioce::count()}}">{{App\Models\invioce::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.invioce')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
 <!------------------------------------------------------------------>

  <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\warehouses::count()}}">{{App\Models\warehouses::count()}}</span>
                                              
                                            </h3>
                                            <small>{{trans('trans.warehouses')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{App\Models\City::count()}}">{{App\Models\City::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.adminShowCities')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                  <span data-counter="counterup" data-value="{{App\Models\subCity::count()}}">{{App\Models\subCity::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.subCity')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="{{App\Models\subsubCity::count()}}">{{App\Models\subsubCity::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.subsubCity')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!------------------------------------------------------------------>

  <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="{{App\Models\expenses::count()}}">{{App\Models\expenses::count()}}</span>
                                              
                                            </h3>
                                            <small>{{trans('trans.expenses')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="{{App\Models\AdminNotification::count()}}">{{App\Models\AdminNotification::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.AdminNotifications')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                  <span data-counter="counterup" data-value="{{App\Models\admin::where('type','admin')->count()}}">{{App\Models\admin::where('type','admin')->count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.admins')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">   </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="{{App\Models\AdminGroup::count()}}">{{App\Models\AdminGroup::count()}}</span>
                                            </h3>
                                            <small>{{trans('trans.AdminGroup')}}</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only"> </span>
                                            </span>
                                        </div>
                                        <div class="status">
                                            <div class="status-title">   </div>
                                            <div class="status-number">  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END CONTENT BODY -->
               

  @endsection

  