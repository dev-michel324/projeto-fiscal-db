@extends('master')

@section('title')
    Venda
@endsection

@section('content')
    <h1 class="text-center my-5">Venda - {{$sell->created_at}}</h1>

    <div>
        <label for="codigo">Código da venda</label>
        <input type="text" class="form-control" id="codigo" value="{{$sell->id}}" disabled>
        <label for="qntd">Quantidade da venda</label>
        <input type="text" class="form-control" id="qntd" value="{{$sell->qntd}}" disabled>
        <label for="valor">Valor total da venda</label>
        <input type="text" class="form-control" id="valor" value="{{$sell->valor_total}}" disabled>
        <label for="cupom">Código do cupom</label>
        <input type="text" class="form-control" id="cupom" value="{{$sell->cupom_id}}" disabled>
    </div>
@endsection