<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\currency;
 
 use Auth;


class currencyController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:currency_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:currency_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:currency_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:currency_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['Showcurrency'],
        ]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        //             
 
     $currency=currency::orderBy('id','desc')->get();

     return view('admin.currency.index',compact('currency'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.currency.create');

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
        $data = $this->validate(\request(),
            [
                'name' => 'required',
                'code' => 'required',
                'exchange_rate' => 'required',
                  
                 
            ]);
     
 

        $currency=currency::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/currency');
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
           $currency=currency::where('id',$id)->first();
             if (!$currency) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.currency.edit',compact('currency'));

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
        //

           $data = $this->validate(\request(),
            [
                'name' => 'required',
                'code' => 'required',
                'exchange_rate' => 'required',
                  
                 
            ]);

                  
           currency::where('id',$request->id)->update($data);

  
                    
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
          $currency=currency::where('id',$id)->first();
                  $currency->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/currency');
    }

        public function actived(Request $request)
{
    $data['status'] = $request->status ;
    currency::where('id', $request->id)->update($data);
   
  
 return 1;

}

}
