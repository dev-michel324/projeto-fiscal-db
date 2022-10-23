@extends('master')

@section('title')
    Produtos
@endsection

@section('content')
    <h1 class="text-center my-5">Produtos</h1>
    <a href="{{route('produtos.create')}}" class="btn btn-sm btn-success">Novo</a>
    <div class="table-responsive my-5">
        <table class="table">
            <thead class="--bg-gradient-primary">
                <th>Descrição</th>
                <th>Valor</th>
                <th>Taxa</th>
                <th>Estoque</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->valor}}</td>
                        <td>{{$produto->taxa}}%</td>
                        <td>{{$produto->estoque}}</td>
                        <td>
                            <form action="{{route('produtos.destroy', ['produto'=>$produto->id])}}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-sm btn-danger" value="remover">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection