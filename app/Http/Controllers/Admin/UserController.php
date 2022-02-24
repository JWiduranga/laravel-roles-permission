<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
            $users = User::latest()->paginate(10);
        } else {
            $users = User::whereNotIn('id', [1])->latest()->paginate(10);
        }

        return view('admin.user.index', compact('users'));
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
            $roles = Role::get()->pluck('name', 'name');
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get()->pluck('name', 'name');
        }
        return view('admin.user.create', compact('roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $user = User::create($request->all());
            $roles = !empty($request->roles) ? $request->roles : [];
            $user->assignRole($roles);
            DB::commit();
            Alert::toast('Record insert successfully', 'success');
        } catch (\Exception $exception) {
            DB::rollback();
            Alert::toast('Something went wrong please try again', 'error');
        }

        return redirect()->route('users.create');
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
    public function edit(User $user)
    {
        $auth = Auth::user();
        if ($auth->hasRole('super-admin')) {
            $roles = Role::get()->pluck('name', 'name');
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get()->pluck('name', 'name');
        }

        return view('admin.user.update', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => ['nullable', 'max:255'],
        ]);
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            $roles = !empty($request->roles) ? $request->roles : [];
            $user->syncRoles($roles);
            DB::commit();
            Alert::toast('Record update successfully', 'success');
            $redirect = redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollback();

            Alert::toast('Something went wrong please try again', 'error');
            $redirect = redirect('users/' . $id . '/edit');
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
