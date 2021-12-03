<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::latest()->paginate(10);

        return view('screens.users.index', compact('users'));
    }


    public function query(Request $request)
    {
        $users = Users::search($request->parameters , $request->information);

        return view('screens.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.users.form');
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'active' => 'required',
            'is_admin' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        Users::create($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view('screens.users.form', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Users::find($id)->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::withTrashed()->find($id)->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Deletado com sucesso.');
    }

    public function checkEmail($email)
    {
        $getEmail = Users::getEmail($email);
        return json_encode($getEmail);
    }


    public function checkUserName($userName)
    {
        $getUserName = Users::getUserName($userName);
        return json_encode($getUserName);
    }
}
