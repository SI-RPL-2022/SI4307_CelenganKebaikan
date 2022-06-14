<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'role_id' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'pekerjaan' => ['required'],
            'no_hp' => ['required'],
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User Berhasil Dibuat');
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
        $roles = Role::all();
        $user = User::find($id);

        return view('user.edit', compact('user', 'roles'));
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
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            // 'password' => [ 'min:8'],
            'role_id' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'pekerjaan' => ['required'],
            'no_hp' => ['required'],
        ]);

        $pass = User::find($id)->password;

        if ($request->password) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan,
                'role_id' => $request->role_id,
                'no_hp' => $request->no_hp
            ]);
        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'pekerjaan' => $request->pekerjaan,
                'role_id' => $request->role_id,
                'no_hp' => $request->no_hp
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
