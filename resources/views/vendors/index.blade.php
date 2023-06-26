{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Fornecedores Cadastrados</h2>
    {{-- se a variável $vendors não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($vendors))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Inscrição Estadual</th>                    
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Telefone</th>
                    <th>E-mail</th>                    
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                {{-- itera sobre a coleção de fornecedores --}}
                @foreach ($vendors as $v)
                    <tr>
                        <td>{{ $v->cnpj }} </td>
                        <td> {{ $v->razaoSocial }} </td>
                        <td> {{ $v->inscEst }} </td>                        
                        <td> {{ $v->cidade }} </td>
                        <td> {{ $v->estado }} </td>
                        <td>{{ $v->telefone }} </td>
                        <td> {{ $v->email }} </td>                       

                        {{-- vai para a rota show, passando o id como parâmetro --}}
                        <td> <a href="{{ route('vendors.show', $v->id) }}"><img src="{{ asset('img/view.svg') }}"></a> </td>
                        <td> <a href="{{ route('vendors.edit', $v->id) }}"><img src="{{ asset('img/edit.svg') }}"></a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- mostra a qtde de fornecedores cadastrados. --}}
                    <td colspan="5">Fornecedores Cadastrados: {{ $vendors->count() }}</td>
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