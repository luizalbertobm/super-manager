<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Principal</a></li>
            <li><a href="{{ route('app.customer') }}">Cliente</a></li>
            <li><a href="{{ route('app.supplier') }}">Fornecedor</a></li>
            <li><a href="{{ route('product.index') }}">Produto</a></li>
            <li><a href="{{ route('app.exit') }}">Sair</a></li>
        </ul>
    </div>
</div>
