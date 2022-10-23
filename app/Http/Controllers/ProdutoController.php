<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:45',
            'taxa' => 'required|numeric|max:100|',
            'estoque' => 'required|integer',
            'valor' => 'required|numeric'
        ]);

        Produto::create([
            'descricao' => $request->descricao,
            'taxa' => $request->taxa,
            'estoque' => $request->estoque,
            'valor' => $request->valor
        ]);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', "Produto removido com sucesso.");
    }
}
