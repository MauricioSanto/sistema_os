<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use App\Models\Servico;
use App\Models\Empresa;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordemservicos = OrdemServico::with('Cliente','Servico','Empresa',)->get();
        $servicos = Servico ::all();
        $empresas = Empresa::all();
        $clientes = Cliente::all();
        return view('ordem_servicos.index', compact('servicos','empresas','clientes','ordemservicos'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordem_servicos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrdemServico::create($request->all());
        
        return redirect()->route('ordem_servicos.index')->with('success', 'Ordem de Serviço criada com sucesso.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServico $ordemservicos, $id)
    {
        OrdemServico::with('cliente','servico','Empresa')->find($id);
        return view('ordem_servicos.show', compact('ordemservico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ordemservicos = OrdemServico::find($id); // busca a ordem de serviço a ser editada
        if (!$ordemservicos) {
            return redirect()->route('ordem_servicos.index')->with('error', 'Ordem de serviço não encontrada.');
        }
        $empresas = Empresa::all(); // Buscando todas as empresas
        $clientes = Cliente::all(); // Buscando todos os clientes
        $servicos = Servico::all(); // Buscando todos os serviços
    
        // Passando os dados para a view
        return view('ordem_servicos.editar', compact('servicos', 'empresas', 'clientes','ordemservicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
    
        Validator ::make($request->all(),[
            'cliente_id'=>'integer ',
            'servico_id'=>'integer',
            'empresa_id'=>'integer',
            'data_inicial'=>'date',
            'data_final'=>'date',
            'valor'=>'decimal',
            'status'=>'boolean'
        
        ]);
        $ordemservicos = OrdemServico::find($id);
    
        if (!$ordemservicos) {
            return redirect()->back()->with('error', 'Ordem de serviço não encontrada.');
        }
    
        $ordemservicos->servico_id = $request->input('servico_id');
        $ordemservicos->cliente_id = $request->input('cliente_id');
        $ordemservicos->empresa_id = $request->input('empresa_id');
        $ordemservicos->data_inicial = $request->input('data_inicial');
        $ordemservicos->data_final = $request->input('data_final');
        $ordemservicos->valor = $request->input('valor');
        $ordemservicos->status = $request->input('status');
        
        $ordemservicos->save();
    
        return redirect()->route('ordem_servicos.index')->with('success', 'Ordem de serviço atualizada com sucesso.');
        
       /* $ordemservico = OrdemServico::find($id);
        $ordemservico->update($request->all());

        return redirect()->route('ordem_servicos.index')->with('success', 'Ordem de Serviço atualizada com sucesso.');*/
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ordemservicos = OrdemServico::find($id);
        
        $ordemservicos->delete();
        return redirect()->route('ordem_servicos.index')->with('success', 'Ordem de Serviço removida com sucesso.');
    }
    
    public function atualizarStatus (Request $request,$id)
    {
        $ordemservicos = OrdemServico::find($id);
        $ordemservicos->status = true;
        $ordemservicos->save();

        return redirect()->route('ordem_servicos.index');
    }
}
