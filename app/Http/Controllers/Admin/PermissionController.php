<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index')->withPermissions(Permission::orderBy('id')->cursorPaginate(15));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'unique:permissions', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            Permission::create($request->toArray());
            DB::commit();
            Alert::toast('Record insert successfully', 'success');
        } catch (\Exception $exception) {
            DB::rollback();
            Alert::toast('Something went wrong please try again', 'error');
        }

        return redirect()->route('permissions.create');
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
    public function edit(Permission $permission)
    {
        return view('admin.permission.update')
            ->withPermission($permission);
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
        $request->validate([
            'name'=>['required', 'max:255', Rule::unique('permissions')->ignore($id)],
        ]);

        DB::beginTransaction();
        try {
            $permission = Permission::findOrFail($id);
            $permission->update($request->toArray());
            DB::commit();
            Alert::toast('Record update successfully', 'success');
            $redirect = redirect()->route('permissions.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Alert::toast('Something went wrong please try again', 'error');
            $redirect = redirect('permissions/' . $id . '/edit');
        }

        return $redirect;
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
    }
}
