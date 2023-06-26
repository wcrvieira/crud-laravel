{{-- herda a view base --}}
@extends('base')

{{-- define o conteúdo --}}
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Produto não encontrado!</h3>
    @else
    {{-- senão, mostra os daddos --}}
        <h2>Mostrando dados do fornecedor</h2>
        <p><strong>Código:</strong> {{ $product->codigo }} </p>
        <p><strong>Descrição Social:</strong> {{ $product->descricao }} </p>
        <p><strong>Unidade. Estadual:</strong> {{ $product->unidade }} </p>
        <p><strong>Classificação:</strong> {{ $product->classe }} </p>
        <p><strong>Quantidade:</strong> {{ $product->quantidade }} </p>
        <p><strong>Preço:</strong> {{ $product->valor }} </p>
        <a href="{{ route('products.index') }}"><img src="{{ asset('img/back.svg') }}"></a>
    @endif
@endsection