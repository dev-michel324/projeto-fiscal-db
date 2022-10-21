@extends('master')

@section('title')
    Criar instituição
@endsection

@section('content')
    <h1 class="text-center">Criar instituição</h1>

    <div class="mt-2">
        <form action="{{ route('instituicoes.store') }}" method="post">
            @csrf
            <label for="nome">Nome da instituição</label>
            <input type="text" class="form-control mb-2" value="{{old('nome')}}" name="nome" id="nome" placeholder="Nome" required>
            <label for="cnpj">CNPJ da instituição</label>
            <input type="text" class="form-control mb-2" value="{{old('cnpj')}}" name="cnpj" id="cnpj" placeholder="cnpj" required>
            <input type="submit" class="btn btn-success" value="Salvar">
        </form>
    </div>
@endsection