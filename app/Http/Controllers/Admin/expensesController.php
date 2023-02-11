<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use Auth;
use App\Models\expenses;
use App\Models\Order;

use Hash;

class expensesController extends Controller
{

     public function __construct() {

        $this->middleware('AdminRole:dashboard_show', [
            'only' => ['dashboard'],
        ]);

          $this->middleware('AdminRole:expenses_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:expenses_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:expenses_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:expenses_delete', [
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
        $expenses=expenses::get();
     return view('admin.expenses.index',compact('expenses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     return view('admin.expenses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $data = $this->validate(\request(),
            [
               
                'TypesOfExpenses_id' => 'sometimes|nullable',
                'value' => 'required',
                'desc' => 'sometimes|nullable',
              
               

            ],[],[
               
                'TypesOfExpenses_id' =>  trans('trans.TypesOfExpenses_id'),
                'value' =>  trans('trans.value'),
                'desc' =>  trans('trans.desc'),
               


            ]);

            
        $expenses=expenses::create($data);

        session()->flash('success', trans('trans.createSuccess'));
        return   redirect('/expenses');
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
       $expenses=expenses::where('id',$id)->first();

     return view('admin.expenses.edit',compact('expenses'));

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
               
                'TypesOfExpenses_id' => 'sometimes|nullable',
                'value' => 'required',
                'desc' => 'sometimes|nullable',
              
               

            ],[],[
               
                'TypesOfExpenses_id' =>  trans('trans.TypesOfExpenses_id'),
                'value' =>  trans('trans.value'),
                'desc' =>  trans('trans.desc'),
               


            ]);


                       
        $expenses=expenses::where('id',$request->id)->update($data);

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
          $expenses=expenses::where('id',$id)->first();
                  $expenses->delete();
              session()->flash('danger', trans('trans.deleteSuccess'));
        return   redirect('/expenses');
    }





}



