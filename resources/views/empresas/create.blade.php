@extends('master')

@section('title')
    Criar empresa
@endsection

@section('content')
    <h1 class="text-center my-5">Criar empresa</h1>

    <div class="mt-2">
        <form action="{{ route('empresas.store') }}" method="post">
            @csrf
            <label for="nome">Nome da empresa</label>
            <input type="text" class="form-control mb-2 @if($errors->has('nome')) is-invalid @endif" value="{{old('nome')}}" name="nome" id="nome" placeholder="Nome" required>
            @error('nome')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <label for="cnpj">CNPJ da empresa</label>
            <input type="text" class="form-control mb-2 @if($errors->has('cnpj')) is-invalid @endif" value="{{old('cnpj')}}" name="cnpj" id="cnpj" placeholder="cnpj" required>
            @error('cnpj')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror

            <input type="submit" class="btn btn-sm btn-success my-1" value="Salvar">
        </form>
    </div>
@endsection