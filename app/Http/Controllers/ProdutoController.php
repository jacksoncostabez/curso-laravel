<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {        
        $this->request = $request;

       // $this->middleware('auth'); 
       
       //$this->middleware('auth')->only('create');

      /* $this->middleware('auth')->only([
           'create', 'store', ''
        ]); */

        //$this->middleware('auth')->except('index'); //aplique em todos, exceto no index.
        $this->middleware('auth')->except([
            'index', 'show'
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $produtos = ['ProdutoController1', 'ProdutoController2', 'ProdutoController3'];
       $products = Product::latest()->simplePaginate(); //pega os últimos registros.
        

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
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Detalhes do ProdutoController: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
