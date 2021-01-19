@extends('site.layouts.base')
@section('title', 'Contato')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            @component('site.layouts._components.form_contact', ['classe'=>'borda-preta', 'motivos'=>$motivos])
                <p>A nossa equipe analisara a sua mensagem</p>
                <p>Nosso tempo medio de resposta é de 48h</p>
            @endcomponent
        </div>
    </div>
</div>
@endsection
