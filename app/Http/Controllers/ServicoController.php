<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Empresa;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::with('empresa','categoria')->get();
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        return view('servicos.index', compact('servicos','empresas','categorias'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicos.create');
        Servico::create([
            
            'categoria_id' => $categoria->id,
            'empresa_id' => $empresa->id,
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Servico::create($request->all());
      
        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servico $servico,$id)
    {
        Servico::with('empresa','categoria')->find($id);
        return view('servicos.show', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servico = Servico::find($id); // Buscando o serviço a ser editado
        $empresas = Empresa::all(); // Buscando todas as empresas
        $categorias = Categoria::all(); // Buscando todas as categorias
    
        // Passando os dados para a view
        return view('servicos.editar', compact('servico', 'empresas', 'categorias'));
       /* $servico = Servico::find($id);
        return view('servicos.editar',compact('servico'));*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        Validator ::make($request->all(),[
            'tipo'=>'string |max:255',
            'valor'=>'numeric',
            'empresa_id'=>'integer',
            'categoria_id'=>'integer',
            'status'=>'boolean',
        ]);
        $servico = Servico::find($id);
        $servico->update($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso.');
       

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço removido com sucesso.');
    }
}
