<!-- BEGIN CONTAINER -->
<div class="page-container">


    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->

                @if(Auth::guard('admin')->check())

                @if(admin()->user()->role("dashboard_show"))
                    <li class="nav-item {{  request()->routeIs('dashboard.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/dashboard" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">{{trans('trans.Dashboard')}}</span>
                        </a>
                    </li>
                     @endif

                        @if(admin()->user()->role("Member_show"))
                    <li class="nav-item {{  request()->routeIs('Member.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/Member" class="nav-link ">
                           <i class="icon-users"></i>
                            <span class="title"> {{trans('trans.Member')}}</span>
                        </a>
                    </li>
                     @endif


                       @if(admin()->user()->role("Department_show"))
                    <li class="nav-item {{  request()->routeIs('Departments.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/Departments" class="nav-link ">
                           <i class="icon-wallet"></i>
                            <span class="title"> {{trans('trans.Department')}}</span>
                        </a>
                    </li>
                     @endif

                      

                       @if(admin()->user()->role("TypesOfExpenses_show"))

                <li class="nav-item {{  request()->routeIs('TypesOfExpenses.*') ? 'active' : '' }}">
                   <a href="{{url('/')}}/TypesOfExpenses" class="nav-link ">
                     <i class="icon-bar-chart"></i>
                       <span class="title"> {{trans('trans.TypesOfExpenses')}}</span>
                   </a>
               </li>
           @endif

            @if(admin()->user()->role("expenses_show"))

                <li class="nav-item {{  request()->routeIs('expenses.*') ? 'active' : '' }}">
                   <a href="{{url('/')}}/expenses" class="nav-link ">
                       <i class="icon-diamond"></i>
                       <span class="title"> {{trans('trans.expenses')}}</span>
                   </a>
               </li>
           @endif

               @if(admin()->user()->role("receipt_show"))

                     <li class="nav-item {{  request()->routeIs('receipt.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/receipt" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.receipt')}}</span>
                        </a>
                    </li>
                @endif

                  @if(admin()->user()->role("CatchReceipt_show"))

                     <li class="nav-item {{  request()->routeIs('CatchReceipt.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/CatchReceipt" class="nav-link ">
                            <i class="fa fa-bitcoin"></i>
                            <span class="title"> {{trans('trans.CatchReceipt')}}</span>
                        </a>
                    </li>
                @endif
                     

           @if(admin()->user()->role("invioce_show"))

                     <li class="nav-item {{  request()->routeIs('invioce.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/invioce" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.invioce')}}</span>
                        </a>
                    </li>
                @endif

                  @if(admin()->user()->role("suppliers_show"))
                     <li class="nav-item {{  request()->routeIs('suppliers.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/suppliers" class="nav-link ">
                            <i class="fa fa-users"></i>
                            <span class="title"> {{trans('trans.suppliers')}}</span>
                        </a>
                    </li>
                     @endif

                     @if(admin()->user()->role("warehouses_show"))
                     <li class="nav-item {{  request()->routeIs('warehouses.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/warehouses" class="nav-link ">
                            <i class="fa fa-building"></i>
                            <span class="title"> {{trans('trans.warehouses')}}</span>
                        </a>
                    </li>
                     @endif

                          @if(admin()->user()->role("currency_show"))
                     <li class="nav-item {{  request()->routeIs('currency.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/currency" class="nav-link ">
                             <i class="fa fa-money"></i>
                            <span class="title"> {{trans('trans.currency')}}</span>
                        </a>
                    </li>
                     @endif

                      @if(admin()->user()->role("tax_show"))
                 <li class="nav-item {{  request()->routeIs('tax.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/tax" class="nav-link ">
                             <i class="fa fa-bitcoin"></i>
                            <span class="title"> {{trans('trans.tax')}}</span>
                        </a>
                    </li>
                     @endif
                     
  @if(admin()->user()->role("adminShowCities_show"))
                     <li class="nav-item {{  request()->routeIs('adminShowCities.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/adminShowCities" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title"> {{trans('trans.Cities')}}</span>
                        </a>
                    </li>
                     @endif

                       @if(admin()->user()->role("subCity_show"))
                     <li class="nav-item {{  request()->routeIs('subCity.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/subCity" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title"> {{trans('trans.subCity')}}</span>
                        </a>
                    </li>
                     @endif

                      @if(admin()->user()->role("subsubCity_show"))
                     <li class="nav-item {{  request()->routeIs('subsubCity.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/subsubCity" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title"> {{trans('trans.subsubCity')}}</span>
                        </a>
                    </li>
                     @endif
 
                   
                @if(admin()->user()->role("AdminNotifications_show"))

                     <li class="nav-item {{  request()->routeIs('AdminNotifications.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/AdminNotifications" class="nav-link ">
                            <i class="icon-paper-plane"></i>
                            <span class="title"> {{trans('trans.AdminNotifications')}}</span>
                        </a>
                    </li>
                     @endif



                       @if(admin()->user()->role("AdminNotifications_show"))

                     <li class="nav-item 
{{ request()->is('AdminNotifications*') ? 'active' : '' }}
                     ">
                        <a href="{{url('/')}}/AdminNotifications" class="nav-link ">
                       <i class="icon-graph"></i>
                            <span class="title"> {{trans('trans.AdminNotifications')}}</span>
                        </a>
                    </li>
                     @endif  
                      
@if(admin()->user()->role("admins_show"))

                     <li class="nav-item {{  request()->routeIs('admins.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/admins" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.admins')}}</span>
                        </a>
                    </li>
                @endif

@if(admin()->user()->role("AdminGroup_show"))

                     <li class="nav-item {{  request()->routeIs('AdminGroup.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/AdminGroup" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title"> {{trans('trans.AdminGroup')}}</span>
                        </a>
                    </li>
                @endif
@if(admin()->user()->role("Settings_show"))
                    
                    <li class="nav-item {{  request()->routeIs('Settings.*') ? 'active' : '' }}">
                        <a href="{{url('/')}}/Settings/edit" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title"> {{trans('trans.Settings')}}</span>
                        </a>
                    </li>
                @endif
                    
 


                @endif


            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->


    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
         