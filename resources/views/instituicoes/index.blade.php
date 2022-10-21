@extends('master')

@section('title')
    Instituições
@endsection

@section('content')
    <h1 class="text-center">Instituições</h1>
    <a href="{{ route('instituicoes.create') }}" class="btn btn-sm btn-success">Novo</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Saldo</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($instituicoes as $instituicao)
                    <tr>
                        <td>{{$instituicao->id}}</td>
                        <td>{{$instituicao->nome}}</td>
                        <td>{{$instituicao->cnpj}}</td>
                        <td>
                            <form action="{{ route('instituicoes.destroy', ['instituicao' => $instituicao->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Remover">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection