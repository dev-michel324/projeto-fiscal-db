@extends('master')

@section('title')
    Criar produto
@endsection

@section('content')
    <h1 class="text-center my-5">Novo produto</h1>
    <div class="table-responsive mt-2">
        <form action="{{route('produtos.store')}}" method="post">
            <form action="{{ route('instituicoes.store') }}" method="post">
                @csrf
                <label for="descricao">Descrição do produto</label>
                <input type="text" class="form-control mb-2 @if($errors->has('descricao')) is-invalid @endif" value="{{old('descricao')}}" name="descricao" id="descricao" placeholder="Descrição" required>
                @error('descricao')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <label for="cnpj">Estoque do produto</label>
                <input type="number" class="form-control mb-2 @if($errors->has('estoque')) is-invalid @endif" value="{{old('estoque')}}" name="estoque" id="estoque" placeholder="Estoque" required>
                @error('estoque')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <label for="taxa">Taxa do produto</label>
                <input type="number" class="form-control mb-2 @if($errors->has('taxa')) is-invalid @endif" value="{{old('taxa')}}" name="taxa" id="taxa" placeholder="Taxa" step=".01" required>
                @error('taxa')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <label for="valor">Valor do produto</label>
                <input type="number" class="form-control mb-2 @if($errors->has('valor')) is-invalid @endif" value="{{old('valor')}}" name="valor" id="valor" placeholder="Valor" step=".01" required>
                @error('estoque')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <input type="submit" class="btn btn-sm btn-success my-1" value="Salvar">
            </form>
        </form>
    </div>
@endsection