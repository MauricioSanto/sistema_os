<?php

namespace App\Http\Controllers;

use App\Models\contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contato = Contato::all();
        
        return view('contato.index', compact('contato'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required',
            'Email' => 'required',
            'Mensagem' => 'required',
            
        ]);

        Contato::create($request->all());
        return redirect()->route('contato.index')->with('success', 'Contato criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contato $contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contato $contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contato $contato)
    {
        //
    }
}
