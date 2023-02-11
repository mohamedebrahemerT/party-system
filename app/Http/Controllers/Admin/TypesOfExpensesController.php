<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use Auth;
use App\Models\TypesOfExpenses;
use App\Models\Order;

use Hash;

class TypesOfExpensesController extends Controller
{

     public function __construct() {

        $this->middleware('AdminRole:dashboard_show', [
            'only' => ['dashboard'],
        ]);

          $this->middleware('AdminRole:TypesOfExpenses_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:TypesOfExpenses_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:TypesOfExpenses_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:TypesOfExpenses_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TypesOfExpenses=TypesOfExpenses::get();
     return view('admin.TypesOfExpenses.index',compact('TypesOfExpenses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.TypesOfExpenses.create');

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

      // return request();

         $data = $this->validate(\request(),
            [
                'name_ar' => 'required',
                'name_en' => 'sometimes|nullable',
              
               

            ],[],[
                 'name_ar' => trans('trans.name_ar'),
                'name_en' =>  trans('trans.name_en'),
               


            ]);

            
        $TypesOfExpenses=TypesOfExpenses::create($data);

        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/TypesOfExpenses');
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
       $TypesOfExpenses=TypesOfExpenses::where('id',$id)->first();

     return view('admin.TypesOfExpenses.edit',compact('TypesOfExpenses'));

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
            //return request();
        $data = $this->validate(\request(),
            [
                'name_ar' => 'required',
                'name_en' => 'sometimes|nullable',
              
               

            ],[],[
                 'name_ar' => trans('trans.name_ar'),
                'name_en' =>  trans('trans.name_en'),
               


            ]);


                       
        $TypesOfExpenses=TypesOfExpenses::where('id',$request->id)->update($data);

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
          $TypesOfExpenses=TypesOfExpenses::where('id',$id)->first();
                  $TypesOfExpenses->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/TypesOfExpenses');
    }





}



