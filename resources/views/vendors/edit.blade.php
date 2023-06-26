{{-- herda a view 'base' --}}
@extends('base')

{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Atualizar um Fornecedor</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" id="update-form" method="POST" action="{{ route('vendors.update', $vendor->id) }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        {{-- o método de atualização é o PUT --}}
        @method('PUT')
        <fieldset class="dados">
        <label for="cnpj">CNPJ:</label>
        <input type="number" name="cnpj" id="cnpj" required value="{{ $vendor->cnpj }}">

        <label for="razaoSocial">Razão Social:</label>
        <input type="text" name="razaoSocial" id="razaoSocial" required value="{{ $vendor->razaoSocial }}">

        <label for="inscEst">Inscrição Estadual:</label>
        <input type="number" name="inscEst" id="inscEst" required value="{{ $vendor->inscEst }}">
    </fieldset>

    <fieldset class="dados">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required value="{{ $vendor->endereco }}">

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required value="{{ $vendor->cidade }}">

        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option required value="{{ $vendor->estado }}"></option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
            <option value="EX">Estrangeiro</option>
        </select>
    </fieldset>

    <fieldset class="dados">
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" required value="{{ $vendor->telefone }}">

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required value="{{ $vendor->email }}">

        <label for="site">Site:</label>
        <input type="text" name="site" id="site" required value="{{ $vendor->site }}">
    </fieldset>       
    </form>

    {{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
    <button form="update-form" type="submit" class="btnEdit">Salvar</button>
    <button form="delete-form" type="submit" class="btnEdit">Excluir</button>

    {{-- form para exclusão --}}
    <form method="POST" class="form" id="delete-form" action="{{ route('vendors.destroy', $vendor->id) }}">
        @csrf
        {{-- o método HTTP para exclusão deve ser o DELETE --}}
        @method('DELETE')
    </form>
@endsection