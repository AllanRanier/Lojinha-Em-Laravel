<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\SubCategorys;
use Illuminate\Http\Request;

class SubCategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorys = SubCategorys::latest()->paginate(10);
        return view('screens.subCategorys.index', compact('subcategorys'));
    }


    public function query(Request $request)
    {
        $subcategorys = SubCategorys::search($request->parameters , $request->information);

        return view('screens.subCategorys.index', compact('subcategorys'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorys = Categorys::orderBy('name', 'ASC')->get();
        return view('screens.subCategorys.form', compact('categorys'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategorys::create($request->all());

        return redirect()->route('subcategorias.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategorys $categorys)
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
        $subcategorys = SubCategorys::find($id);
        $categorys = Categorys::orderBy('name', 'ASC')->get();
        return view('screens.subCategorys.form', compact('categorys', 'subcategorys'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SubCategorys::find($id)->update($request->all());

        return redirect()->route('subcategorias.index')
            ->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategorys::withTrashed()->find($id)->delete();

        return redirect()->route('subcategorias.index')
            ->with('success', 'Deletado com sucesso.');
    }


}
