<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Venda, Produto, Cupom};
use App\Http\Requests\BuyValidate;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::all();
        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Produto::all();
        return view('vendas.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuyValidate $request)
    {
        $data = json_decode($request->data, true);
        $sellsBuffer = array();

        foreach($data as $sell){
            $product = Produto::findOrFail($sell['id']);
            $this->updateProductInventory($sell['id'], $sell['user_qntd']);
            $sell = Venda::insertGetId([
                'qntd' => $sell['user_qntd'],
                'valor_total' => $product->valor * $sell['user_qntd'],
                'produto_id' => $sell['id']
            ]);
            array_push($sellsBuffer, $sell);
        }
        $cupom = Cupom::insertGetId(["hora" => now()]);
        $this->addSellsOnCupom($cupom, $sellsBuffer);

        return redirect()
            ->route('vendas.index')
            ->with('success', 'Foi gerado um novo cupom, você pode doar indo na opção cupons no menu.');
    }

    private function addSellsOnCupom($cupomId, array $sells)
    {
        foreach($sells as $sellId){
            $sell = Venda::findOrFail($sellId);
            $sell->cupom_id = $cupomId;
            $sell->save();
        }
        return true;
    }

    private function updateProductInventory($id, $qntd)
    {
        $product = Produto::findOrFail($id);
        $product->estoque = $product->estoque - $qntd;
        $product->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sell = Venda::findOrFail($id);
        return view('vendas.index', compact('sell'));
    }

}
