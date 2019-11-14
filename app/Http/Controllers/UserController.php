<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
        ]);
    }

    public function index()
    {
        $users = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'users.email', 'roles.name AS role_name')
            ->orderBy('roles.name')
            ->get();
        return view('list', ["users" => $users]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()
            ->route('user_list')
            ->with('success','User deleted successfully');
    }

    public function add()
    {
        $roles = Role::all()->sortBy("name");
        return view('add', compact("roles"));
    }

    public function create(Request $request)
    {
        $user = new User;
        $roles = Role::all()->sortBy("name");
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()
            ->route('user_add', compact("roles"))
            ->with('success','User created successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all()->sortBy("name");
        return view('edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all()->sortBy("name");
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        $user->update();
        return redirect()
            ->route('user_edit', ['id' => $id, 'roles' => $roles])
            ->with('success','User edited successfully');
    }
}
