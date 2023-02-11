

@extends('admin.index')

@section('content')

  @push('js')
       

            <script>

                // Replace the <textarea id="editor1"> with a CKEditor

                // instance, using default configuration.

                CKEDITOR.replace( 'Statement' , {

        language: 'ar',

});
 



            </script>
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
                                    <a href="{{url('/')}}/invioce">{{trans('trans.invioce')}}</a>
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
                  <form role="form" action="{{url('/')}}/invioce" method="POST" enctype="multipart/form-data">
                    @csrf
                   
 


                  <div class="row">

                    <div class="col-md-12">

                  <div class="row">

                 

        <div class="form-group col-md-4">
                               <label class="control-label">{{trans('trans.customer_name')}}</label>
              <input type="text" placeholder="{{trans('trans.customer_name')}}" class="form-control"    name="customer_name"  required=""/> 
          </div>


     <div class="form-group col-md-2">
                               <label class="control-label">{{trans('trans.price')}}</label>
              <input type="text" placeholder="{{trans('trans.price')}}" class="form-control txt"    name="price"  required=""/> 
          </div>


    

 
            <div class="form-group col-md-2 ItemNumber">
                               <label class="control-label">{{trans('trans.Quantity')}}</label>

                   <input  type="number" placeholder="{{trans('trans.ItemNumber')}}" class="form-control txt"    name="Quantity"   /> 
              
          </div>
 
<div class="form-group col-md-2">
                               <label class="control-label">{{trans('trans.Total')}}</label>
  

                   <input type="number" placeholder="{{trans('trans.Total')}}" class="form-control"    name="total"  required="" id="mytext" /> 
              
          </div>

           <div class="form-group col-md-12">
                                    <label class="control-label">{{trans('trans.Statement')}}</label>
  <textarea class="form-control" name="Statement" class="form-control Statement">
                   
              </textarea>



                                    
                                </div>




                      
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
    

    <script type="text/javascript">
      $(document).ready(function(){

    //iterate through each textboxes and add keyup
    //handler to trigger sum event
    $(".txt").each(function() {
          
      $(this).keyup(function(){
            
         var sum = 1;
         
    //iterate through each textboxes and add the values
    $(".txt").each(function() {
             
      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
        sum =sum * parseFloat(this.value);
        
      }

    });
    //.toFixed() method will roundoff the final sum to 2 decimal places
     

         document.getElementById("mytext").value = sum;
      });
    });

  });

  
    </script>

 
                @endpush

  @endsection

