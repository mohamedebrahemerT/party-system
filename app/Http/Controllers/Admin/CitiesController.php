<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\CompanyCity;
 use Auth;


class CitiesController extends Controller
{

    public function __construct() 
    {
           
        $this->middleware('AdminRole:adminShowCities_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:adminShowCities_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:adminShowCities_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:adminShowCities_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


         $this->middleware('AdminRole:companies_show', [
            'only' => ['ShowCities'],
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
 
     $Cities=City::orderBy('id','desc')->get();

     return view('admin.Cities.index',compact('Cities'));

    }

     public function ShowCities($id)
    {
        //             

                      
                       $CompanyCities=CompanyCity::where('company_id',$id)->get();

                        $CitiesID=[];

                        foreach ($CompanyCities as $key => $CompanyCity)
                        {
                            # code...
                            array_push($CitiesID, $CompanyCity->city_id);

                        }
                            $Cities=City::whereIn('id',$CitiesID)->get();

     return view('admin.Cities.index',compact('Cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.Cities.create');

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
                'name_ar' => 'required',
                'ProvinceCode' => 'required',
           
         
                 
           
                
                 
            ]);
     

        $City=City::create($data);
        session()->flash('success', trans('trans.createSuccess'));


        return   redirect('/adminShowCities');
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
           $City=City::where('id',$id)->first();
             if (!$City) 
          {
              session()->flash('danger', trans('trans.LinknotFound'));

            return back();
          }
            

     return view('admin.Cities.edit',compact('City'));

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
                'name_ar' => 'required',
                'ProvinceCode' => 'required',
        
               
                
                 
            ]);

                   
 
           City::where('id',$request->id)->update($data);

  
                    
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
          $City=City::where('id',$id)->first();
                  $City->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/adminShowCities');
    }

    public function actived(Request $request)
{
    $data['status'] = $request->status ;
    City::where('id', $request->id)->update($data);
   
  
 return 1;

}


}
