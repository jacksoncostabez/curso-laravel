<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //quando retorna um array no laravel automaticamente ele vira um .json.
    public function index()
    {
        $products = ['Produto 1', 'Produto 2', 'Produto 3'];
        
        return $products;
    }

    //O id é passado como parâmetro na URL do projeto
    public function show($id)
    {
        echo "Exibindo produto de id: {$id}";
    }

    public function create()
    {
        echo "Exibindo form de cadastro de novo produto";
    }

    public function edit($id)
    {
        echo "Editando produto {$id}";
    }

    public function store()
    {
        echo "Cadastrando novo produto";
    }

    public function update($id)
    {
        echo "Editando o produto {$id}";
    }

    public function destroy($id)
    {
        echo "Excluindo o produto {$id}";
    }

}
