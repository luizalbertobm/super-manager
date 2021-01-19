@extends('app.layouts.base')


@section('title', 'Fornecedor')

@section('content')

<div class="titulo-pagina-2">
    <p>Fornecedor</p>
</div>
<div class="menu">
    <ul>
        <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
        <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    <div style="width:30%; margin-left: auto; margin-right:auto">
        <form action="{{ route('app.supplier.list') }}" method="get">
            @csrf
            <input type="text" placeholder="Nome" name="nome" class="borda-preta">
            <input type="text" placeholder="Site" name="site" class="borda-preta">
            <input type="text" placeholder="UF" name="uf" class="borda-preta">
            <input type="text" placeholder="E-mail" name="email" class="borda-preta">
            <button type="submit" class="borda-preta">Pesquisar</button>
        </form>
    </div>
</div>


@endsection
