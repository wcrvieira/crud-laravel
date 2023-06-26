{{-- herda a view base --}}
@extends('base')

{{-- define o conteúdo --}}
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Fornecedor não encontrado!</h3>
    @else
    {{-- senão, mostra os daddos --}}
        <h2>Mostrando dados do fornecedor</h2>
        <p><strong>CNPJ:</strong> {{ $vendor->cnpj }} </p>
        <p><strong>Razão Social:</strong> {{ $vendor->razaoSocial }} </p>
        <p><strong>Insc. Estadual:</strong> {{ $vendor->inscEst }} </p>
        <p><strong>Cidade:</strong> {{ $vendor->cidade }} </p>
        <p><strong>Estado:</strong> {{ $vendor->estado }} </p>
        <p><strong>Telefone:</strong> {{ $vendor->telefone }} </p>
        <a href="{{ route('vendors.index') }}"><img src="{{ asset('img/back.svg') }}"></a>
    @endif
@endsection