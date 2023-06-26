<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //..recuperando os produtos do banco de dados
        $products = Product::all();
        //..retorna a view index passando a variável $products
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //..mostrando o formulário de cadastro
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //..instancia um novo model Product
        $product = new Product();

        //..pega os dados vindos do form e seta no model
        $product->codigo = $request->input('codigo');
        $product->descricao = $request->input('descricao');
        $product->unidade = $request->input('unidade');
        $product->classe = $request->input('classe');
        $product->quantidade = $request->input('quantidade');
        $product->valor = $request->input('valor');        

        //..persiste o model na base de dados
        $product->save();

        //..retorna a view com uma variável msg que será tratada na própria view
        $products = Product::all();
        return view('products.index')->with('products', $products)
            ->with('msg', 'Produto cadastrado com sucesso!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o produto da base de dados
        $product = Product::find($id);

        //..se encontrar o produto, retorna a view com o objeto correspondente
        if ($product) {
            return view('products.show')->with('product', $product);
        } else {
            //..senão, retorna a view com uma mensagem que será exibida.
            return view('product.show')->with('msg', 'Produto não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //..recupera o produto da base de dados
        $product = Product::find($id);

        //..se encontrar o produto, retorna a view de edição com o objeto correspondente
        if ($product) {
            return view('products.edit')->with('product', $product);
        } else {
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $products = Product::all();            
            return view('products.index')->with('products', $products)
                ->with('msg', 'Produto não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //..recupera o produto mediante o id
        $product = Product::find($id);

        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $product->codigo = $request->input('codigo');
        $product->descricao = $request->input('descricao');
        $product->unidade = $request->input('unidade');
        $product->classe = $request->input('classe');
        $product->quantidade = $request->input('quantidade');
        $product->preco = $request->input('preco');
        
        //..persite as alterações na base de dados
        $product->save();

        //..retorna a view index com uma mensagem
        $products = Product::all();
        return view('products.index')->with('products', $products)
            ->with('msg', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $product = Product::find($id);

        //..exclui o recurso    
        $product->delete();

        //..retorna à view index.
        $products = Product::all();
        return view('products.index')->with('products', $products)
            ->with('msg', "Produto excluído com sucesso!");    
    }
}
