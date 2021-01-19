@extends('app.layouts.base')


@section('title', 'Fornecedor')

@section('content')

<div class="titulo-pagina-2">
    <p>Fornecedor - Adicionar</p>
</div>
<div class="menu">
    <ul>
        <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
        <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    {{$msg ?? ''}}
    <div style="width:30%; margin-left: auto; margin-right:auto">
        <form action="{{route('app.supplier.add')}}" method="post">
            <input type="hidden" name="id" value="{{$supplier->id ?? ''}}">
            @csrf
            <input value="{{ $supplier->nome ?? old('nome')}}" type="text" placeholder="Nome" name="nome" class="borda-preta">
            {{$errors->has('nome') ? $errors->first('nome') : '' }}
            <input value="{{$supplier->site ?? old('site')}}" type="text" placeholder="Site" name="site" class="borda-preta">
            {{$errors->has('site') ? $errors->first('site') : '' }}
            <input value="{{$supplier->uf ?? old('uf')}}" type="text" placeholder="UF" name="uf" class="borda-preta">
            {{$errors->has('uf') ? $errors->first('uf') : '' }}
            <input value="{{$supplier->email ?? old('email')}}" type="text" placeholder="E-mail" name="email" class="borda-preta">
            {{$errors->has('email') ? $errors->first('email') : '' }}
            <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
    </div>
</div>


@endsection
