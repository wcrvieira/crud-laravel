{{-- herda a view 'base' --}}
@extends('base')

{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Atualizar um Fornecedor</h2>
{{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
<form class="form" id="update-form" method="POST" action="{{ route('products.update', $product->id) }}">
    {{-- CSRF é um token de segurança para validar o formulário --}}
    @csrf
    {{-- o método de atualização é o PUT --}}
    @method('PUT')
    <fieldset class="dados">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" required value="{{ $product->codigo }}">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required value="{{ $product->descricao }}">

        <label for="unidade">Unidade:</label>
        <input type="text" name="unidade" id="unidade" required value="{{ $product->unidade }}">
    </fieldset>

    <fieldset class="dados">
        <label for="classe">Classificação:</label>
        <input type="text" name="classe" id="classe" required value="{{ $product->classe }}">

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required value="{{ $product->quantidade }}">

        <label for="valor">Preço:</label>
        <input type="text" name="valor" id="valor" required value="{{ $product->valor }}">
    </fieldset>
</form>

{{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
<button form="update-form" type="submit" class="btnEdit">Salvar</button>
<button form="delete-form" type="submit" class="btnEdit">Excluir</button>

{{-- form para exclusão --}}
<form method="POST" class="form" id="delete-form" action="{{ route('products.destroy', $product->id) }}">
    @csrf
    {{-- o método HTTP para exclusão deve ser o DELETE --}}
    @method('DELETE')
</form>
@endsection