<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $Validator = Validator ::make($request->all(),[
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
            'status'=>'required|boolean',
        ]);

        if ($Validator->fails()) {
            return redirect()->route('clientes.index')->with('errors', $Validator->errors());
        }
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->data_nascimento = $request->input('data_nascimento');
        $cliente->status = $request->input('status');
    
        // Processamento do arquivo de foto, se houver
        if ($request->hasFile('foto')) {
            // Armazena a foto
            $path = $request->file('foto')->store('clientes', 'public');
            $cliente->foto = $path;
        }
    
        // Salva o cliente no banco de dados
        $cliente->save();
        
        /*$foto_camimho = $request->file('foto')->store('fotos', 'public');
        
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'foto' => $foto_camimho,
            'status'=> $request->status
        ]);*/  
        
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente->status == 0) {
            // Status é verdadeiro (ativo)
            return 'Usuário ativo';
        } else {
            // Status é falso (inativo)
            return 'Usuário inativo';
        }
        return view('clientes.show', compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'nome'=>'string |max:255',
            'data_nascimento'=>'date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'boolean'
        ]);
        
        $cliente = Cliente::find($id);
        $foto_camimho = $request->file('foto')->store('fotos', 'public');
        
        $cliente->nome =  $request->nome;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->foto = $foto_camimho;
        $cliente->status= $request->status;
        $cliente->save();
        
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso.');
    }
    public function atualizarStatus (Request $request,$id)
        {
            $cliente = Cliente::find($id);
            $cliente->status = true;
            $cliente->save();

            return redirect()->route('clientes.index');
        }
}
