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
    public function show(OrdemServico $ordemServico, $id)
    {
        OrdemServico::with('cliente','servico','Empresa')->find($id);
        return view('ordem_servicos.show', compact('ordemservico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ordemServico = OrdemServico::find($id); // busca a ordem de serviço a ser editada
        $empresas = Empresa::all(); // Buscando todas as empresas
        $clientes = Cliente::all(); // Buscando todos os clientes
        $servicos = Servico::all(); // Buscando todos os serviços
    
        // Passando os dados para a view
        return view('ordem_servicos.editar', compact('servicos', 'empresas', 'clientes'));
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
        $ordemServico = OrdemServico::find($id);
    
        if (!$ordemServico) {
            return redirect()->back()->with('error', 'Ordem de serviço não encontrada.');
        }
    
        $ordemServico->servico_id = $request->input('servico_id');
        $ordemServico->cliente_id = $request->input('cliente_id');
        $ordemServico->empresa_id = $request->input('empresa_id');
        $ordemServico->data_inicial = $request->input('data_inicial');
        $ordemServico->data_final = $request->input('data_final');
        $ordemServico->valor = $request->input('valor');
        $ordemServico->status = $request->input('status');
        
        $ordemServico->save();
    
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
}
