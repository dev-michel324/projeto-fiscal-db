@extends('master')

@section('title')
    Doar cupom
@endsection

@section('content')
    <h1 class="my-5">Cupom</h1>

    <div class="text-center">
        <h3><strong>Criado em: </strong>{{ date('d/m/Y H:i:s', strtotime($cupom->hora)) }}</h3>
        <h3><strong>Doado: </strong>@if($cupom->doado) Sim @else Não @endif</h3>
        <h3><strong>Código da empresa: </strong>{{$cupom->empresa_id}}</h3>
        <h2>Vendas:</h2 >
        <ol>
            @php
                $sells = \App\Models\Venda::where('cupom_id', $cupom->id)->get();
            @endphp
            @foreach ($sells as $sell)
                <li>
                    <strong>id:</strong> {{$sell->id}} -
                    <strong>qntd:</strong> {{$sell->qntd}} -
                    <strong>total:</strong> {{$sell->valor_total}} -
                    <strong>produto:</strong> {{$sell->produto->descricao}}
                </li>
            @endforeach
        </ol>
        @if(!$cupom->doado)
        <a href="{{ route('cupons.edit', ['cupon'=>$cupom->id]) }}">
            <button class="btn btn-sm btn-success">Doar</button>
        </a>
        @endif
    </div>
@endsection