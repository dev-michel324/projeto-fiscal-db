@extends('master')

@section('title')
    Nova venda
@endsection

@section('content')
    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    <h1 class="my-5">Nova venda</h1>

    <div>
        <h2 class="text-center my-2">Produtos</h2>
        <div class="table-responsive shadow-2 mb-5">
            <table class="table" id="available-products">
                <thead class="--bg-gradient-primary">
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Taxa</th>
                    <th>Estoque</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->descricao}}</td>
                        <td>{{$product->valor}}</td>
                        <td>{{$product->taxa}}</td>
                        <td>{{$product->estoque}}</td>
                        <td><button class="btn btn-sm btn-success" onclick="buy(this)">$</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 class="text-center my-2">Carrinho</h2>
        <div class="table-responsive shadow-2 mb-5">
            <table class="table" id="cart">
                <thead class="--bg-gradient-primary">
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <form id="form_cart" action="{{route('vendas.store')}}" method="post">
            @csrf
            <input id="sendForm" type="button" value="Salvar" class="btn btn-sm btn-success">
        </form>

        <div class="modal shadow-2 position-fixed display-none fade-in modal-center">
            <div class="modal-header --bg-gradient-primary">
                <h3>Adicionar ao carrinho</h3>
            </div>
            <div class="modal-content">
                <p>Produto: <span id="product-name"></span></p>
                <p>Estoque: <span id="product-estoque"></span></p>
                <p>Quantidade: <input type="number" id="product-qntd-user" oninput="verifyQntd();"></p>
                <div class="display-flex justify-content-center mt-2">
                    <button class="btn btn-sm btn-success" id="confirm-buy">Comprar</button>
                    <button class="btn btn-sm btn-primary" id="cancel-modal">Cancelar</button>
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('assets/js/sells.js')}}"></script>
@endsection