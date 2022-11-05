@extends('master')

@section('title')
    Cupons
@endsection

@section('content')
    <h1 class="my-5">Cupons</h1>

    <div class="table-responsive">
        <table class="table">
            <thead class="--bg-gradient-primary">
                <th>Criado</th>
                <th>Doado</th>
                <th>ID da instituição</th>
                <th>Nome da instituição</th>
                <th>ID da empresa</th>
                <th>Nome da Empresa</th>
            </thead>
            <tbody>
                @foreach ($cupons as $cupom)
                    <tr>
                        <td>
                                <a href="{{ route('cupons.show', ['cupon'=>$cupom->id]) }}" class="link">
                                    {{ date('d/m/Y H:i:s', strtotime($cupom->hora)) }}
                                </a>
                        </td>
                        <td>@if($cupom->doado) Sim @else Não @endif</td>
                        @if($cupom->instituicao_id)
                            <td>{{$cupom->instituicao_id}}</td>
                            <td>{{$cupom->instituicao->nome}}</td>
                        @else
                            <td>-</td>
                            <td>-</td>
                        @endif

                        @if($cupom->empresa_id)
                            <td>{{$cupom->empresa_id}}</td>
                            <td>{{$cupom->empresa->nome}}</td>
                        @else
                            <td>-</td>
                            <td>-</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection