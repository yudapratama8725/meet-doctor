<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Requests\Role\StoreRoleRequest;
use App\Requests\Role\UpdateRoeRequest;

//use everything
//use Gate;
use Auth;

//model here
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\RoleUser;
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\PermissionRole;

//thirdparty package

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.management-access.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        //get all request from frontsite
        $data = $request->all();

        //Store to database
        $role = Consultation::create($data);

        alert()->success('Success Message', 'Successfully added new role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role = load('permission');
        
        return view('pages.backsite.management-access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permission = Permission::all();
        $role->load('permission');

        return view('pages.backsite.management-access.role.edit', compact('permission','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permission()->sync($request->input('permission', []));

        alert()->success('Success Message', 'Successfully updated role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->forceDelete();

        alert()->success('Success Message', 'Successfully deleted role');
        return back();
    }
}
