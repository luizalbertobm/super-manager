@extends('app.layouts.base')


@section('title', 'Fornecedor')

@section('content')

<div class="titulo-pagina-2">
    <p>Fornecedor - Listar</p>
</div>
<div class="menu">
    <ul>
        <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
        <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    <div style="width:90%; margin-left: auto; margin-right:auto">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>UF</th>
                    <th>E-mail</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->nome}}</td>
                    <td>{{$supplier->site}}</td>
                    <td>{{$supplier->uf}}</td>
                    <td>{{$supplier->email}}</td>
                    <td><a href="{{route('app.supplier.remove', $supplier->id)}}">Excluir</a></td>
                    <td><a href="{{route('app.supplier.edit', $supplier->id)}}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$suppliers->appends($request)->links()}}
        <br>
        Exibindo {{$suppliers->count()}} item(ns) de um total de {{$suppliers->total()}}
        <br>
        De {{$suppliers->firstItem()}} a {{$suppliers->lastItem()}}
    </div>
</div>


@endsection
