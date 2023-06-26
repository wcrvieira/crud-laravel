<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Pegando as variáveis de ambiente --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<header>
    <figure>
        <a href="/"><img src="{{ asset('img/apps.png')}}" alt="menu" title="menu"></a>
    </figure>

    <h1>CRUD Laravel PHP</h1>
    <nav class="menu">
        <section class="dropdown">
            <button class="dropbtn">Home</button>
            <section class="dropdown-content">
                <a href="/">Início</a>                
            </section>
        </section>

        <section class="dropdown">
            <button class="dropbtn">Fornecedores</button>
            <section class="dropdown-content">
                <a href="/vendors">Listagem</a>
                <a href="/vendors/create">Cadastro</a>
            </section>
        </section>

        <section class="dropdown">
            <button class="dropbtn">Produtos</button>
            <section class="dropdown-content">
                <a href="/products">Listagem</a>
                <a href="/products/create">Cadastro</a>
            </section>
        </section>
    </nav>
</header>

<body>
    <main class="container">
        <section class="content">
            <img src="{{ asset('img/crud.jpg')}}" class="tema" alt="Onde estás?"  
                title="Crud Laravel PHP" width="65%">
            @yield('content')
        </section>
    </main>
</body>

<footer>
    <p>Made by Wagner Cesar Vieira &copy;
        <a href="mailto:vieira.wagner@aluno.ifsp.edu.br" target="_blank">Contato</a>
    </p>
</footer>

</html>