{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Produtos Cadastrados</h2>
    {{-- se a variável $products não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($products))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Unidade</th>
                    <th>Classe</th>
                    <th>Quantidade</th>
                    <th>Valor</th>                    
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                {{-- itera sobre a coleção de produtos --}}
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->codigo }} </td>
                        <td>{{ $p->descricao }} </td>
                        <td>{{ $p->unidade }} </td>
                        <td>{{ $p->classe }} </td>
                        <td>{{ $p->quantidade }} </td>
                        <td>{{ $p->valor }} </td>

                        {{-- vai para a rota show, passando o id como parâmetro --}}
                        <td> <a href="{{ route('products.show', $p->id) }}"><img src="{{ asset('img/view.svg') }}"></a> </td>
                        <td> <a href="{{ route('products.edit', $p->id) }}"><img src="{{ asset('img/edit.svg') }}"></a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- mostra a qtde de produtos cadastrados. --}}
                    <td colspan="5">Produtos Cadastrados: {{ $products->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection