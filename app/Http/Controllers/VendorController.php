<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //..recuperando os fornecedores do banco de dados
        $vendors = Vendor::all();
        //..retorna a view index passando a variável $vendors
        return view('vendors.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //..mostrando o formulário de cadastro
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //..instancia um novo model Vendor
        $vendor = new Vendor();

        //..pega os dados vindos do form e seta no model
        $vendor->cnpj = $request->input('cnpj');
        $vendor->razaoSocial = $request->input('razaoSocial');
        $vendor->inscEst = $request->input('inscEst');
        $vendor->endereco = $request->input('endereco');
        $vendor->cidade = $request->input('cidade');
        $vendor->estado = $request->input('estado');
        $vendor->telefone = $request->input('telefone');
        $vendor->email = $request->input('email');
        $vendor->site = $request->input('site');

        //..persiste o model na base de dados
        $vendor->save();

        //..retorna a view com uma variável msg que será tratada na própria view
        $vendors = Vendor::all();
        return view('vendors.index')->with('vendors', $vendors)
            ->with('msg', 'Fornecedor cadastrado com sucesso!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o fornecedor da base de dados
        $vendor = Vendor::find($id);

        //..se encontrar o fornecedor, retorna a view com o objeto correspondente
        if ($vendor) {
            return view('vendors.show')->with('vendor', $vendor);
        } else {
            //..senão, retorna a view com uma mensagem que será exibida.
            return view('vendors.show')->with('msg', 'Fornecedor não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //..recupera o fornecedor da base de dados
        $vendor = Vendor::find($id);

        //..se encontrar o fornecedor, retorna a view de edição com o objeto correspondente
        if ($vendor) {
            return view('vendors.edit')->with('vendor', $vendor);
        } else {
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $vendors = Vendor::all();            
            return view('vendors.index')->with('vendors', $vendors)
                ->with('msg', 'Fornecedor não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //..recupera o fornecedor mediante o id
        $vendor = Vendor::find($id);

        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $vendor->cnpj = $request->input('cnpj');
        $vendor->razaoSocial = $request->input('razaoSocial');
        $vendor->inscEst = $request->input('inscEst');
        $vendor->endereco = $request->input('endereco');
        $vendor->cidade = $request->input('cidade');
        $vendor->estado = $request->input('estado');
        $vendor->telefone = $request->input('telefone');
        $vendor->email = $request->input('email');
        $vendor->site = $request->input('site');

        //..persite as alterações na base de dados
        $vendor->save();

        //..retorna a view index com uma mensagem
        $vendors = Vendor::all();
        return view('vendors.index')->with('vendors', $vendors)
            ->with('msg', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $vendor = Vendor::find($id);

        //..exclui o recurso
        $vendor->delete();

        //..retorna à view index.
        $vendors = Vendor::all();
        return view('vendors.index')->with('vendors', $vendors)
            ->with('msg', "Fornecedor excluído com sucesso!");
    }
}
