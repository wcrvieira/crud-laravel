{{-- herda a view 'base' --}}
@extends('base')

{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
<h2>Cadastrar Novo Fornecedor</h2>
{{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
<form class="form" method="POST" action="{{ route('vendors.store') }}">
    {{-- CSRF é um token de segurança para validar o formulário --}}
    @csrf
    <fieldset class="dados">
        <label for="cnpj">CNPJ:</label>
        <input type="number" name="cnpj" id="cnpj" required>

        <label for="razaoSocial">Razão Social:</label>
        <input type="text" name="razaoSocial" id="razaoSocial" required>

        <label for="inscEst">Inscrição Estadual:</label>
        <input type="number" name="inscEst" id="inscEst" required>
    </fieldset>

    <fieldset class="dados">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
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
        <input type="tel" name="telefone" id="telefone" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>

        <label for="site">Site:</label>
        <input type="text" name="site" id="site" required>
    </fieldset>

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>
</form>
@endsection