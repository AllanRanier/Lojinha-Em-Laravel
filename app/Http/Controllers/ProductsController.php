<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\Products;
use App\Models\SubCategorys;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->paginate(10);
        return view('screens.products.index', compact('products'));
    }


    public function query(Request $request)
    {
        $products = Products::search($request->parameters, $request->information);

        return view('screens.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::orderBy('name', 'ASC')->get();
        $subCategorys = SubCategorys::orderBy('name', 'ASC')->get();
        return view('screens.products.form', compact('categorys', 'subCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // Verificando se existe Image e se o PDF é Valido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestIMAGE = $request->file('image');
            $imageName = md5($requestIMAGE->getClientOriginalName() . strtotime('now')) .  '.' . $requestIMAGE->extension(); // modificando o nome da IMAGE com md5 e a data atual
            $requestIMAGE->move(public_path('arquivos/images'), $imageName); // Salvando o pdf na pasta public do laravel
            $data['image'] = $imageName;
        }

        $data['code'] = $this->codeGenerate();

        Products::create($data);

        return redirect()->route('produtos.index')
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        $categorys = Categorys::orderBy('name', 'ASC')->get();
        $subCategorys = SubCategorys::orderBy('name', 'ASC')->get();
        return view('screens.products.form', compact('products', 'categorys', 'subCategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $data = $request->all();
        // Verificando se existe Image e se o PDF é Valido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestIMAGE = $request->file('image');
            $imageName = md5($requestIMAGE->getClientOriginalName() . strtotime('now')) .  '.' . $requestIMAGE->extension(); // modificando o nome da IMAGE com md5 e a data atual
            $requestIMAGE->move(public_path('arquivos/images'), $imageName); // Salvando o pdf na pasta public do laravel
            $data['image'] = $imageName;
        }
        Products::find($id)->update($data);

        return redirect()->route('produtos.index')
            ->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::withTrashed()->find($id)->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Deletado com sucesso.');
    }

        /**
     * Gerar o numero do código da carteira do cliente
     */
    public function codeGenerate()
    {
       return str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT) . date('d') . str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
    }
}
