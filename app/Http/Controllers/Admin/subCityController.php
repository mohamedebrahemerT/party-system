<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\subCity;
 
 use Auth;


class subCityController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:subCity_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:subCity_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:subCity_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:subCity_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['ShowsubCity'],
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
 
     $subCity=subCity::get();

     return view('admin.subCity.index',compact('subCity'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.subCity.create');

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
                'city_id' => 'required',
                 
                 
            ]);
     

        $subCity=subCity::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/subCity');
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
           $subCity=subCity::where('id',$id)->first();
             if (!$subCity) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.subCity.edit',compact('subCity'));

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

           //
        $data = $this->validate(\request(),
            [
                'name' => 'required',
                'code' => 'required',
                'city_id' => 'required',
                 
                 
            ]);
     

                   
 
           subCity::where('id',$request->id)->update($data);

  
                    
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
          $subCity=subCity::where('id',$id)->first();
                  $subCity->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/subCity');
    }
}
