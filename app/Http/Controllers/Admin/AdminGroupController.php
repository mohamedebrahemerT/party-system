<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminGroup;
use App\Models\AdminGroupRole;

use App\Http\Controllers\Validations\AdminGroupsRequest;

class AdminGroupController extends Controller
{
       /* public function __construct() {
           
        $this->middleware('AdminRole:AdminGroup_show', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('AdminRole:AdminGroup_add', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('AdminRole:AdminGroup_edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('AdminRole:AdminGroup_delete', [
            'only' => ['destroy', 'multi_delete'],
        ]);
        
    }*/

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $AdminGroups=AdminGroup::where('id','!=',1)->get();
        return view('admin.admingroups.index',compact('AdminGroups'));
    }

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {


        return view('admin.admingroups.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Or Redirect
     */

    public function StoreRoleRequest($data, $group_id) {
        $permissions = [];
        foreach ($data as $key => $val) {
            $roule_type = explode('_', $key);
            if (count($roule_type) > 0 && !empty($roule_type[0])) {
                $permissions[$roule_type[0]] = [
                    'name' => $roule_type[0],
                    'show' => request($roule_type[0] . '_show') ? 'yes' : 'no',
                    'edit' => request($roule_type[0] . '_edit') ? 'yes' : 'no',
                    'add' => request($roule_type[0] . '_add') ? 'yes' : 'no',
                    'delete' => request($roule_type[0] . '_delete') ? 'yes' : 'no',
                ];
            }
        }

        foreach ($permissions as $val) {
            AdminGroupRole::create([
                'admin_groups_id' => $group_id,
                'name' => $val['name'],
                'show' => $val['show'],
                'add' => $val['add'],
                'edit' => $val['edit'],
                'delete' => $val['delete'],
            ]);
        }

    }
    public function store(AdminGroupsRequest $request) 
    {

        $data = $request->except("_token", "_method");
        $data['admin_id'] = $this->admin()->id();
        $group = AdminGroup::create($data);

        // Store Group Roles In Table
        $this->StoreRoleRequest($data, $group->id);

        session()->flash('success', trans('trans.createSuccess'));
        
            return redirect('AdminGroup');
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $admingroups = AdminGroup::find($id);
        return is_null($admingroups) || empty($admingroups) ?
        backWithError(trans("admin.undefinedRecord")) :
        view('admin.admingroups.show', [
            'title' => trans('admin.show'),
            'admingroups' => $admingroups,
        ]);
    }

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
         $admingroups = AdminGroup::find($id);
        return is_null($admingroups) || empty($admingroups) ?
        backWithError(trans("trans.undefinedRecord")) :
        view('admin.admingroups.edit', [
            'title' => trans('trans.edit'),
            'admingroups' => $admingroups,
        ]);
    }

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminGroupsRequest $request, $id) {

        // return request();
        // Check Record Exists
        $admingroups = AdminGroup::find($id);
        if (is_null($admingroups) || empty($admingroups)) {
            return backWithError(trans("admin.undefinedRecord"));
        }

        $data = $request->except("_token", "_method");
        $data['admin_id'] = $this->admin()->id();
        AdminGroup::where('id', $id)->update([
            'group_name' => $data['group_name'],
            'admin_id' => $data['admin_id'],
        ]);

        // Delete Old Roles
        AdminGroupRole::where('admin_groups_id', $id)->delete();
        // Store Group Roles In Table
        $this->StoreRoleRequest($data, $id);

  
         
         session()->flash('success', trans('trans.updatSuccess'));
        return   back();

    }

    /**
     * Baboon Script By [It V 1.5.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $admingroups = AdminGroup::find($id);
        if (is_null($admingroups) || empty($admingroups)) {
            return backWithError(trans('admin.undefinedRecord'));
        }
        // Delete Roles
        AdminGroupRole::where('admin_groups_id', $id)->delete();
        $admingroups->delete();
        return backWithSuccess(trans('admin.deleted'));

    }

    public function multi_delete() {
        $data = request('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $admingroups = AdminGroup::find($id);
                if (is_null($admingroups) || empty($admingroups)) {
                    return backWithError(trans('admin.undefinedRecord'));
                }
                // Delete Roles
                AdminGroupRole::where('admin_groups_id', $id)->delete();
                $admingroups->delete();

            }
            return backWithSuccess(trans('admin.deleted'));
        } else {
            $admingroups = AdminGroup::find($data);
            if (is_null($admingroups) || empty($admingroups)) {
                return backWithError(trans('admin.undefinedRecord'));
            }
            // Delete Roles
            AdminGroupRole::where('admin_groups_id', $id)->delete();
            $admingroups->delete();
            return backWithSuccess(trans('admin.deleted'));
        }
    }


    function admin() {
        return auth()->guard('admin');
    }

    
}
