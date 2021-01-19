@extends('app.layouts.base')


@section('title', 'Produto')

@section('content')

<div class="titulo-pagina-2">
    <p>Listagem de produtos</p>
</div>
<div class="menu">
    <ul>
        <li><a href="{{ route('product.create') }}">Novo</a></li>
        <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    <div style="width:90%; margin-left: auto; margin-right:auto">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso</th>
                    <th>Unidade ID</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->nome}}</td>
                    <td>{{$product->descricao}}</td>
                    <td>{{$product->peso}}</td>
                    <td>{{$product->unidade_id}}</td>
                    <td><a href="{{route('app.supplier.remove', $product->id)}}">Excluir</a></td>
                    <td><a href="{{route('app.supplier.edit', $product->id)}}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->appends($request)->links()}}
        <br>
        Exibindo {{$products->count()}} item(ns) de um total de {{$products->total()}}
        <br>
        @if ($products->firstItem())
            Do item {{$products->firstItem()}} a {{$products->lastItem()}}
        @endif
    </div>
</div>


@endsection
