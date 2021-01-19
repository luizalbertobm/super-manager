@extends('app.layouts.base')


@section('title', 'Produto')

@section('content')

<div class="titulo-pagina-2">
    <p>Produto - Adicionar</p>
</div>
<div class="menu">
    <ul>
        <li><a href="{{ route('product.index') }}">Voltar</a></li>
        <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    {{$msg ?? ''}}
    <div style="width:30%; margin-left: auto; margin-right:auto">
        <form action="{{route('app.supplier.add')}}" method="post">
            @csrf
            <input value="{{ $supplier->nome ?? old('nome')}}" type="text" placeholder="Nome" name="nome" class="borda-preta">
            {{$errors->has('nome') ? $errors->first('nome') : '' }}
            <input value="{{$supplier->site ?? old('descricao')}}" type="text" placeholder="Descricao" name="descricao" class="borda-preta">
            {{$errors->has('descricao') ? $errors->first('descricao') : '' }}
            <input value="{{$supplier->uf ?? old('peso')}}" type="text" placeholder="UF" name="peso" class="borda-preta">
            {{$errors->has('peso') ? $errors->first('peso') : '' }}

            <select name="unidade_id" >
                <option value="">-- Selecione uma unidade--</option>
                @foreach ($unities as $unity)
                    <option value="{{$unity->id}}">{{$unity->descricao}}</option>
                @endforeach
            </select>
            <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
    </div>
</div>


@endsection
