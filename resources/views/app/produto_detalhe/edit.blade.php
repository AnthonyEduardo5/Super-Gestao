@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

<div class = "conteudo-pagina-2">
    <div class = "titulo-pagina">
        <p>Editar Detalhes do Produto</p>
    </div>

    <div class="menu">
    <li><a href= "#">Voltar</a></li>
    </div>

    <div class="informacao-pagina">
        <h4>Produto</h4>
        <div>Nome:{{ $produto_detalhe->item->nome}} </div>
        <br>
        <div>Descricao:{{$produto_detalhe->item->descricao}} </div>
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>
</div>
@endsection