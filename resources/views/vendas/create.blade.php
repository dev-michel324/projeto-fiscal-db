@extends('master')

@section('title')
    Nova venda
@endsection

@section('content')
    <h1 class="text-center my-5">Nova venda</h1>

    <div>
        <form action="{{route('vendas.store')}}" method="post">
            
            <input type="submit" value="Salvar" class="btn btn-sm btn-success">
        </form>
    </div>
@endsection