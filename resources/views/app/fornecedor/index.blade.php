@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<div class = "conteudo-pagina-2">
    <div class = "titulo-pagina">
        <p>Fornecedor</p>
    </div>

    <div class="menu">
        @include('app.layouts._partials.menu_fornecedor')
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
        {{ $msg ?? ""}}
            <form method="post" action="{{ route('app.fornecedor.listar') }}">
                @csrf
                <input type = "text" name = "nome" placeholder="Nome" class= "borda-preta">

                <input type = "text" name = "site" placeholder="Site" class= "borda-preta">

                <input type = "text" name = "uf" placeholder="UF" class= "borda-preta">
                
                <input type = "text" name = "email" placeholder="E-mail" class= "borda-preta">

                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection