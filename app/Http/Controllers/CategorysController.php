<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use Illuminate\Http\Request;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Categorys::latest()->paginate(10);
        return view('screens.categorys.index', compact('categorys'));
    }


    public function query(Request $request)
    {
        $categorys = Categorys::search($request->parameters , $request->information);

        return view('screens.categorys.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.categorys.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categorys::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show(Categorys $categorys)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Categorys::find($id);
        return view('screens.categorys.form', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Categorys::find($id)->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorys::withTrashed()->find($id)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Deletado com sucesso.');
    }



    public function checkCategory($categorys)
    {
        $getCategory = Categorys::getCategory($categorys);
        return json_encode($getCategory);
    }

}
