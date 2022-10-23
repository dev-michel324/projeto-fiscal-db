@extends('master')

@section('title')
    Vendas
@endsection

@section('content')
    <h1 class="text-center my-5">Vendas</h1>
    <a href="{{route('vendas.create')}}" class="btn btn-sm btn-success">Novo</a>
    <div class="table-responsive my-5">
        <table class="table">
            <thead class="--bg-gradient-primary">
                <th>Código</th>
                <th>Quantidade</th>
                <th>Valor total</th>
                <th>Cód. do cupom</th>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <td>{{$venda->id}}</td>
                        <td>{{$venda->qntd}}</td>    
                        <td>{{$venda->valor_total}}</td>
                        <td>{{$venda->cupom_id}}</td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection