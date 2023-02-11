<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\subsubCity;
 
 use Auth;


class subsubCityController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:subsubCity_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:subsubCity_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:subsubCity_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:subsubCity_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['ShowsubsubCity'],
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
 
     $subsubCity=subsubCity::get();

     return view('admin.subsubCity.index',compact('subsubCity'));

    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.subsubCity.create');

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
                'subCity_id' => 'required',
                 
                 
            ]);
     

        $subsubCity=subsubCity::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/subsubCity');
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
           $subsubCity=subsubCity::where('id',$id)->first();
             if (!$subsubCity) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.subsubCity.edit',compact('subsubCity'));

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
                'subCity_id' => 'required',
                 
                 
            ]);

                   
 
           subsubCity::where('id',$request->id)->update($data);

  
                    
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
          $subsubCity=subsubCity::where('id',$id)->first();
                  $subsubCity->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/subsubCity');
    }
}
