<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\warehouses;
 
 use Auth;


class warehousesController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:warehouses_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:warehouses_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:warehouses_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:warehouses_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['Showwarehouses'],
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
 
     $warehouses=warehouses::orderBy('id','desc')->get();

     return view('admin.warehouses.index',compact('warehouses'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.warehouses.create');

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
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                   
                 
            ]);
     
 

        $warehouses=warehouses::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/warehouses');
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
           $warehouses=warehouses::where('id',$id)->first();
             if (!$warehouses) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.warehouses.edit',compact('warehouses'));

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
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                   
                 
            ]);

                  
           warehouses::where('id',$request->id)->update($data);

  
                    
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
          $warehouses=warehouses::where('id',$id)->first();
                  $warehouses->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/warehouses');
    }

        public function actived(Request $request)
{
    $data['status'] = $request->status ;
    warehouses::where('id', $request->id)->update($data);
   
  
 return 1;

}

}
