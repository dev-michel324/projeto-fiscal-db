<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupom;
use App\Models\Instituicao;
use App\Models\Produto;
use App\Models\Venda;
use DateTime;
use Illuminate\Support\Facades\Gate;

class CupomController extends Controller
{
    public function index()
    {
        $cupons = Cupom::with(['empresa', 'instituicao'])->get();
        
        return view('cupons.index', compact('cupons'));
    }

    public function show($id)
    {
        $cupom = Cupom::findOrFail($id);
        return view('cupons.show', compact('cupom'));
    }

    public function edit($id)
    {
        $cupom = Cupom::findOrFail($id);
        return view('cupons.edit', compact('cupom'));
    }

    private function differenceBetweenDays($date)
    {
        $data = new DateTime($date);
        $difference = $data->diff(now());
        return $difference->days;
    }

    public function update($id, Request $request)
    {
        $validator = $request->validate([
            'business_id' => ['required', 'integer', 'exists:empresas,id'],
            'institute_id' => ['required', 'integer', 'exists:instituicaos,id']
        ]);

        $cupom = Cupom::findOrFail($id);
        
        if(Gate::allows('can_donate', $cupom)){
            abort(400, 'Cupom já foi doado.');
        }

        if($this->differenceBetweenDays($cupom->hora) > 60)
            abort(400, 'Cupom inválido.');

        $cupom->doado = 1;
        $cupom->empresa_id = $request->business_id;
        $cupom->instituicao_id = $request->institute_id;
        $cupom->save();

        $this->sendTaxToInstitute($cupom, $request->institute_id);

        return redirect()
            ->route('cupons.index')
            ->with('success', 'Cupom doado com sucesso!');
    }

    private function sendTaxToInstitute($cupom, $institute_id)
    {
        $institute = Instituicao::find($institute_id);

        $sells = Venda::where('cupom_id', $cupom->id)->get();
        $total = 0;
        foreach($sells as $sell){
            $product = Produto::find($sell->produto_id);
            $total += ($sell->valor_total * $product->taxa) / 100;
        }
        $total = round($total, 2) * 0.2;
        $institute->saldo = $institute->saldo + round($total, 2);
        $institute->save();
    }
}
