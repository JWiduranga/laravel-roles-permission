<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('super-admin')) {
            $roles = Role::all();
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->hasRole('super-admin')) {
            $permissions = Permission::get()->pluck('name', 'name');
        } else {
            $permissions = Permission::whereNotIn('name', ['manage-permission'])->get()->pluck('name', 'name');
        }

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create($request->except('permission'));
            $permissions = !empty($request->permission) ? $request->permission : [];
            $role->givePermissionTo($permissions);
            DB::commit();
            Alert::toast('Record insert successfully', 'success');
        } catch (\Exception $exception) {
            DB::rollback();
            Alert::toast('Something went wrong please try again', 'error');
        }

        return redirect()->route('roles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $user = Auth::user();
        if ($user->hasRole('super-admin')) {
            $permissions = Permission::get()->pluck('name', 'name');
        } else {
            $permissions = Permission::whereNotIn('name', ['manage-permission'])->get()->pluck('name', 'name');
        }

        return view('admin.role.update')->with(['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($id)],
        ]);

        DB::beginTransaction();
        try {
            $role = Role::findOrFail($id);
            $role->update($request->except('permission'));
            $permissions = !empty($request->permission) ? $request->permission : [];
            $role->syncPermissions($permissions);
            DB::commit();

            Alert::toast('Record update successfully', 'success');
            $redirect = redirect()->route('roles.index');
        } catch (\Exception $exception) {
            DB::rollback();

            Alert::toast('Something went wrong please try again', 'error');
            $redirect = redirect('roles/' . $id . '/edit');
        }

        return $redirect;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
