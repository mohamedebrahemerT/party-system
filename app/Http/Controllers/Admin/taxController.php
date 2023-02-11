<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\tax;
 
 use Auth;


class taxController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:tax_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:tax_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:tax_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:tax_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['Showtax'],
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
 
     $tax=tax::orderBy('id','desc')->get();

     return view('admin.tax.index',compact('tax'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.tax.create');

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
                'rate' => 'required',
                   
                 
            ]);
     
 

        $tax=tax::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/tax');
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
           $tax=tax::where('id',$id)->first();
             if (!$tax) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.tax.edit',compact('tax'));

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
                'rate' => 'required',
                   
                 
            ]);

                  
           tax::where('id',$request->id)->update($data);

  
                    
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
          $tax=tax::where('id',$id)->first();
                  $tax->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/tax');
    }

        public function actived(Request $request)
{
    $data['status'] = $request->status ;
    tax::where('id', $request->id)->update($data);
   
  
 return 1;

}

}
