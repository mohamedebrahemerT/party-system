<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\suppliers;
 
 use Auth;


class suppliersController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:suppliers_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:suppliers_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:suppliers_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:suppliers_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['Showsuppliers'],
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
 
     $suppliers=suppliers::orderBy('id','desc')->get();

     return view('admin.suppliers.index',compact('suppliers'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.suppliers.create');

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
                'image' => 'required',
                'company_name' => 'required',
                'vat_number' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'address' => 'required',
                   
                 
            ]);
     
      if ($request->image) 
               {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/suppliers'), $imageName);
            $data['image'] = 'images/suppliers/'.$imageName;
           }     


        $suppliers=suppliers::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/suppliers');
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
           $suppliers=suppliers::where('id',$id)->first();
             if (!$suppliers) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.suppliers.edit',compact('suppliers'));

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
                
                'company_name' => 'required',
                'vat_number' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'address' => 'required',
                   
                 
            ]);

                    if ($request->image) 
               {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/suppliers'), $imageName);
            $data['image'] = 'images/suppliers/'.$imageName;
           } 
           suppliers::where('id',$request->id)->update($data);

  
                    
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
          $suppliers=suppliers::where('id',$id)->first();
                  $suppliers->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/suppliers');
    }

        public function actived(Request $request)
{
    $data['status'] = $request->status ;
    suppliers::where('id', $request->id)->update($data);
   
  
 return 1;

}

}
