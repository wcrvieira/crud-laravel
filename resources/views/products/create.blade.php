{{-- herda a view 'base' --}}
@extends('base')

{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Cadastrar Novo Produto</h2>
{{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
<form class="form" method="POST" action="{{ route('products.store') }}">
    {{-- CSRF é um token de segurança para validar o formulário --}}
    @csrf
    <fieldset class="dados">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" required>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required>

        <label for="unidade">Unidade:</label>
        <input type="text" name="unidade" id="unidade" required>
    </fieldset>

    <fieldset class="dados">
        <label for="classe">Classificação:</label>
        <input type="text" name="classe" id="classe" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required>

        <label for="valor">Preço:</label>
        <input type="text" name="valor" id="valor" required>
    </fieldset>

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>
</form>
@endsection