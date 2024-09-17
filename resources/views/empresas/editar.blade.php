<!DOCTYPE html>
<html>
    <head>
        <title>Editar Empresa</title>
    </head>
    <body>
        <h1>Editar Empresa</h1>
        <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="">RAZÃO SOCIAL:</label>
            <input type="text" name="razao_social" id= "razao_social" value="{{ $empresa->razao_social }}">
            <label for="">CNPJ:</label>
            <input type="string" name="cnpj" id="cnpj" value="{{ $empresa->cnpj }}">
            <label for="">ENDEREÇO:</label>
            <input type="text" name="endereco"  id="endereco" value="{{ $empresa->endereco }}"> </input>
            <label for="">TELEFONE:</label>
            <input  type="string" name="telefone"  id="telefone" value="{{ $empresa->telefone }}"> </input>
            <label for="">CEP:</label>
            <input  type="string" name="cep"  id="cep" value="{{ $empresa->cep }}"> </input>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>