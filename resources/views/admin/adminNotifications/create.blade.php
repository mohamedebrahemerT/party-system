

@extends('admin.index')

@section('content')

  
                      @push('js')
       

            <!--script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'message' , {

        language: 'ar',

});

               
        

                   



            </script -->
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
                                    <a href="{{url('/')}}/AdminNotifications">{{trans('trans.AdminNotifications')}}</a>
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
                  <form role="form" action="{{url('/')}}/AdminNotifications/store" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                         <div class="form-group">
 
     <label for="form_control_1">وجهة الإشعار</label>
                                        <span class="help-block">برجاء اختيار وجهة الإشعار</span>
                          <select class="form-control" name="type" required id="type">
                                            <option value="" hidden></option>
                                            <option value="User">عميل</option>
                                   
                                            <option value="AllUsers">كل العملاء</option>
                                
                                 
                                        </select>
          </div>

             <div class="form-group   users">
                               <label class="control-label">{{trans('trans.user')}}</label>

                <select name="admin_id" class="form-control select2">
                    @foreach(App\Models\admin::get() as $user)
                    <option value="{{$user->id}}">
                       
                                {{$user->name}}- {{$user->phone}}- ({{$user->email}}) 
                               
                    </option>
                    @endforeach
                    
                </select>
          </div>



                         <div class="form-group">
                               <label class="control-label">{{trans('trans.message')}}</label>

              <textarea class="form-control"  name="message" class="form-control message">
                  
              </textarea>

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
           
   <script>

        $('#type').on('change', function() {

          
 
            if (this.value == 'AllUsers'){
                $('.users').show();
               
            }

            if (this.value == 'User'){
                $('.users').show();
              
               
            }
             else{
                $('.users').hide();
                 
                
            }
        });
    </script>

 
                @endpush

  @endsection

