<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Esse arquivo é usado pelo ProductFactory,Product eProductsSeeder para mapear a base de dados
 * É porque eu mapeei a rota /teste para o arquivo TesteController
 */

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::all(); // pega todos os dados
        //$products = Product::get(); // pega todos os dados tbm
        //$products = Product::paginate(); //tras os 15 primeiros
        $products = Product::latest()->paginate(); //pega os últimos registros.
        

        return view('admin.pages.testes.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        /*Essa é uma das formas mais simples de validar. E não é a forma recomendada porque trás muita informação
        para o controller. E ele deve ser mais simples possível! */
       
        /* $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]); */

        //dd($request->all()); // pega todos os dados cadastrados no form. (mais usado)
        //dd($request->only(['name', 'description'])); // pega o nome e a descrição
        //dd($request->name); //pega somente o name (mais usado)
        //dd($request->has('name')); // retorna true se existir esse campo
        //dd($request->input('name', 'default')); //adiciona um valor default ao name caso o name não exista.
        //dd($request->except('_token')); // pega todos os dados, exceto o token.
        //dd($request->file('photo')); // retorna todos os dados do arquivo enviado
        //dd($request->file('photo')->isValid()); // verifica se o arquivo é válido para upload.
        //dd($request->photo->extension()); // mostra extensão do arquivo
        //dd($request->photo->getClientOriginalName()); // retorna o nome original do arquivo.
        if($request->file('photo')->isValid()) {
            //dd($request->file('photo')->store('products')); //products é a pasta onde vai ficar o arquivo storage/app/products. Ele salva com o nome padrão do arquivo
            $nameFile = $request->name . '.' . $request->photo->extension();
            //dd($request->file('photo')->storeAs('public/products', $nameFile)); //Salva o arquivo com nome personalizado dentro do diretório privado em storage/products
            dd($request->file('photo')->storeAs('public/products', $nameFile)); //Salva o arquivo com nome personalizado dentro do diretório storage/public/products
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.testes.edit', compact('id'));
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
        dd("Editando o produto: {$id}");
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
