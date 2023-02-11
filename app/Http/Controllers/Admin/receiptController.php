<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



use App\Models\receipt;

use App\Models\purchases;

use App\Models\product_purchases;

use App\Models\CompanyCity;

use App\Models\CompanyModerator;


use Session;
 

 use Auth;

 use DB;

 use PDF;





class receiptController extends Controller

{

 

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index( )

    {

        //             

    $receipt=receipt::orderBy('id','desc')->get();



     return view('admin.receipt.index',compact('receipt'));



    }



   



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

     return view('admin.receipt.create');



    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

        

        //return request();

        $data = $this->validate(\request(),

            [

                'customer_name' => 'required',

                'price' => 'required',

                'Quantity' => 'required',

                'total' => 'required',

                'Statement' => 'required',

                

                 

            ]);
    
                 $total=request('total') ;

                 $vate=$total * (gettax()  /100);

                $total_afetr_vate= $total + $vate;



                  $data['date']=date('Y-m-d');     

                  $data['time']=date('H:m:s');     

                  $data['vate']=$vate;     

                  $data['total_afetr_vate']=$total_afetr_vate;  

     $data['reference_no']='receipt-' . date("Ymd") . '-'. date("his");  



             





        $receipt=receipt::create($data);

        session()->flash('success', trans('trans.createSuccess'));



                   return redirect('/receiptprint/'. $receipt->id); 

 

                  

               

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

           $receipt=receipt::where('id',$id)->first();

            



     return view('admin.receipt.edit',compact('receipt'));



    }



    public function receiptprint($id)

    {

        //

           $receipt=receipt::where('id',$id)->first();

            



     return view('admin.receipt.print',compact('receipt'));



    }


/*public function downloadPDF($id) 
{
         $receipt = receipt::find($id);
       
      $pdf = PDF::loadView('admin.receipt.pdfviewreceipt', compact('receipt'))->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf->download('فاتوره '.$receipt->customer_name.'.pdf');
}*/

public function downloadPDF($id)
    {
        if(Session::has('currency_code')){
            $currency_code = Session::get('currency_code');
        }
        else{
            $currency_code ='EGP' ;
        }
        $language_code = 'ar';

        $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';

        if($currency_code == 'BDT' || $language_code == 'bd'){
            // bengali font
            $font_family = "'Hind Siliguri','sans-serif'";
        }elseif($currency_code == 'KHR' || $language_code == 'kh'){
            // khmer font
            $font_family = "'Hanuman','sans-serif'";
        }elseif($currency_code == 'AMD'){
            // Armenia font
            $font_family = "'arnamu','sans-serif'";
        }elseif($currency_code == 'ILS'){
            // Israeli font
            $font_family = "'Varela Round','sans-serif'";
        }elseif($currency_code == 'AED' || $currency_code == 'EGP' || $language_code == 'sa' || $currency_code == 'IQD' || $language_code == 'ir' || $language_code == 'om' || $currency_code == 'ROM'){
            // middle east/arabic font
            $font_family = "'XBRiyaz','sans-serif'";
        }elseif($currency_code == 'THB'){
            // thai font
            $font_family = "'Kanit','sans-serif'";
        }else{
            // general for all
            $font_family = "'Roboto','sans-serif'";
        }

                $receipt = receipt::find($id);

        return PDF::loadView('admin.receipt.pdfviewreceipt',[
            'receipt' => $receipt,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ])->download('فاتوره '.$receipt->customer_name.'.pdf');
    }

    public function showreceipt($id)

    {

        //

           $receipt=receipt::where('reference_no',$id)->first();

            



     return view('admin.receipt.showreceipt',compact('receipt'));



    }

    

 



 



 

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

         {

             

        $data = $this->validate(\request(),

            [

                'customer_name' => 'required',

                'price' => 'required',

                'Quantity' => 'required',

                'total' => 'required',

                'Statement' => 'required',

                

                 

            ]);

                 $total=request('total') ;

                $vate=$total * (gettax()  /100);

                $total_afetr_vate= $total + $vate;



                    

                  $data['vate']=$vate;     

                  $data['total_afetr_vate']=$total_afetr_vate;  

 

           receipt::where('id',$request->id)->update($data);



  

                    

                 session()->flash('success', trans('trans.updatSuccess'));

        return   back();

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

          $receipt=receipt::where('id',$id)->first();

                  $receipt->delete();

              session()->flash('danger', trans('trans.deleteSuccess'));

        return   redirect('/receipt');

    }

}

