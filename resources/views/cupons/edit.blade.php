@extends('master')

@section('title')
    Doar cupom
@endsection

@section('content')
    @php
        $business = \App\Models\Empresa::all();
        $institutes = \App\Models\Instituicao::all();
    @endphp

    <h1 class="my-5">Cupom</h1>

    <div class="text-center">
        <h3><strong>Criado em: </strong>{{ date('d/m/Y H:i:s', strtotime($cupom->hora)) }}</h3>
        <h3><strong>Doado: </strong>@if($cupom->doado) Sim @else Não @endif</h3>
        <h3><strong>Código da empresa: </strong>{{$cupom->empresa_id}}</h3>

        <form action="{{ route('cupons.update', ['cupon'=>$cupom->id]) }}" method="post">
            @csrf
            <input type="hidden" name="coupon_id" value="{{$cupom->id}}">
            <label for="business" class="d-block">Selecione a empresa doadora</label>
            <select name="business_id" id="business">
                @foreach ($business as $busines)
                    <option value="{{$busines->id}}">{{$busines->nome}} - {{$busines->cnpj}}</option>
                @endforeach
            </select>
            <label for="institutes" class="d-block">Instituição que receberá</label>
            <select name="institute_id" id="institutes">
                @foreach ($institutes as $institute)
                    <option value="{{$institute->id}}">{{$institute->nome}} - {{$institute->cnpj}}</option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-sm btn-success" value="Doar">
        </form>
    </div>
@endsection