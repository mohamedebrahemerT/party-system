 <!DOCTYPE html>

 <html>

 <head>

     <meta charset="utf-8">

     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title></title>



     <style type="text/css">

         .invoice-title h2, .invoice-title h3 {

    display: inline-block;

}



.table > tbody > tr > .no-line {

    border-top: none;

}



.table > thead > tr > .no-line {

    border-bottom: none;

}



.table > tbody > tr > .thick-line {

    border-top: 2px solid;

}

   <style type="text/css">
              @media
only screen and (max-width:600px) {
  table, thead, tbody, th, td, tr {
    display: block;
    text-align: center;
  }
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
    text-align: center;

  }
 
  td {
    border: none;
 
    position: relative;
    padding-left: 200px;
    margin-left: 150px;
    text-align: center;

  }
 
 
}
            </style>

     </style>



     <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">

 </head>

 <body style="text-align:center; direction:rtl;     font-family: 'Cairo', sans-serif;">





 <div class="container">

    <div class="row">

        <div class="col-xs-12">

            <div class="row">

                <div class="col-md-6">

                   <img src="{{url('/')}}/{{setting()->logo}}" style="height: 133px;"> 

                </div>

               <div class="col-md-6">

                    <h4 class="vfdhgfh"> {{setting()->name}}   

 

</h4>



 

   <h2>   سند قبض  # {{    $CatchReceipt->id}}</h2>

                </div>





            </div>      

            <hr>



            

            <div class="row">

                <div class="col-xs-6">

                    <address>

                    <strong> الي :</strong>

                      {{$CatchReceipt->customer_name}}<br>

                       

                       

                    </address>

                </div>

                <div class="col-xs-6 text-right">

                    <address>

                    <strong>من :</strong>

                       {{setting()->name}} 

                      

                    </address>

                </div>

            </div>

                       <div class="row">

                <div class="col-xs-6">

                    <address>

                        <strong> طريقة الدفع :</strong>

                       تحويل بنكي 

                    </address>

                </div>

                <div class="col-xs-6 text-right">

                    <address>

                        <strong> تاريخ ال   سند قبض :</strong>

                       {{$CatchReceipt->date}}<br><br>

                    </address>

                </div>

            </div>

        </div>

    </div>

    

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title"><strong> 

   سند قبض ضريبة

  </strong></h3>

                </div>

                <div class="panel-body">

                      <div class="panel-heading">

               
<strong>{{trans('trans.Statement')}}  </strong>:
                  {!! $CatchReceipt->Statement !!} 
 
                </div>


                    <div class="table-responsive">

                        <table class="table table-condensed"  >

                            <thead>

                                <tr>

                                     

                                    <td class="text-center"><strong>{{trans('trans.Quantity')}}  </strong></td>

                                    <td class="text-center"><strong>{{trans('trans.price')}} </strong></td>

                                      <td class="text-right"><strong> المجموع الفرعي</strong></td>

                                </tr>

                            </thead>

                            <tbody>

                                <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                <tr>

                               

                                    <td class="text-center"> {{$CatchReceipt->Quantity}} </td>

                                    <td class="text-center">  {{$CatchReceipt->price}}  رس</td>

                                    <td class="text-right">  {{$CatchReceipt->total}}  رس </td>

                                </tr>

                                

                                    <td class="thick-line"></td>

                                    <td class="thick-line"></td>

                                    <td class="thick-line text-center"><strong>{{trans('trans.total')}}</strong></td>

                                    <td class="thick-line text-right"> {{$CatchReceipt->total}}  رس </td>

                                </tr>

                                <tr>

                                    <td class="no-line"></td>

                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong> ضريبة القيمة المضافة 15% </strong></td>

                                    <td class="no-line text-right"> {{$CatchReceipt->vate}} رس   </td>

                                </tr>

                                <tr>

                                    <td class="no-line"></td>

                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong> 

                                      الاجمالي  </strong></td>

                                    <td class="no-line text-right"> {{$CatchReceipt->total_afetr_vate}} رس   </td>

                                </tr>



                                <tr>



                     <td class="centered" colspan="3">

                    <?php echo '<img style="margin-top:10px;" src="data:image/png;base64,' . DNS1D::getBarcodePNG(url('/').'/showCatchReceipt/'.$CatchReceipt->reference_no, 'C128') . '" width="300" alt="barcode"   />';?>

                    <br>

                    <?php echo '<img style="margin-top:10px;" src="data:image/png;base64,' . DNS2D::getBarcodePNG(url('/').'/showCatchReceipt/'.$CatchReceipt->reference_no, 'QRCODE') . '" alt="barcode"   />';?>    

                    </td>



                </tr>

                            </tbody>

                        </table>

                        

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script type="text/javascript">



    function auto_print() {     



        window.print()



    }



    setTimeout(auto_print, 1000);



</script>





 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

 </body>

 </html>