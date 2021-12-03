<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::latest()->paginate(10);

        return view('screens.clients.index', compact('clients'));
    }


    public function query(Request $request)
    {
        $Clients = Clients::search($request->parameters , $request->information);

        return view('screens.clients.index', compact('Clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.clients.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Clients::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $Clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Clients = Clients::find($id);
        return view('screens.Clients.form', compact('Clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Clients::find($id)->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $Clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clients::withTrashed()->find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Deletado com sucesso.');
    }

    public function checkEmail($email)
    {
        $getEmail = Clients::getEmail($email);
        return json_encode($getEmail);
    }

}
