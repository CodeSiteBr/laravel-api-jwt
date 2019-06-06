<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => 'index']);
        // $this->middleware('auth', ['except' => ['index', 'create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produto::latest()->paginate(5);

        return view('produtos.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'titulo'    => 'required',
            'descricao' => 'required'
        ]);

        $store = Produto::create($request->all());
        if($store){
            return redirect('produtos')->with('success', 'Produto adicionado com sucesso.');
        }else{
            return redirect('produtos')->with('error', 'Erro ao adicionar o Produto.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produto::findOrFail($id);
        return view ('produtos.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produto::findOrFail($id);
        return view ('produtos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'    => 'required',
            'descricao' => 'required'
        ]);

        $produto = Produto::findOrFail($id);
        $update = $produto->update($request->all());

        if($update){
            return redirect('produtos')->with('success', 'Produto editado com sucesso.');
        }else{
            return redirect('produtos')->with('error', 'Erro ao editar o Produto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $delete = $produto->delete();

        if($delete){
            return redirect('produtos')->with('success', 'Produto deletado com sucesso.');
        }else{
            return redirect('produtos')->with('error', 'Erro ao deletar o Produto.');
        }
    }
}
