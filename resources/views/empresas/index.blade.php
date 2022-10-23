@extends('master')

@section('title')
    Empresas
@endsection

@section('content')
    <h1 class="text-center my-5">Empresas</h1>
    <a href="{{ route('empresas.create') }}" class="btn btn-sm btn-success">Novo</a>
    <div class="table-responsive my-5">
        <table class="table">
            <thead class="--bg-gradient-primary">
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td>{{$empresa->id}}</td>
                        <td>{{$empresa->nome}}</td>
                        <td>{{$empresa->cnpj}}</td>
                        <td>
                            <form action="{{ route('empresas.destroy', ['empresa' => $empresa->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-sm btn-danger" value="Remover">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection