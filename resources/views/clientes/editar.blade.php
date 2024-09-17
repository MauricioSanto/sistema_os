<!DOCTYPE html>
<html>
    <head>
        <title>Editar Cliente</title>
    </head>
    <body>
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Nome:</label>
            <input type="text" name="nome" id= "nome" value="{{ $cliente->nome }}">
            <label for="">Data Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $cliente->data_nascimento }}">
            <label for="">Foto:</label>
            <input type="file" name="foto"  id="foto" value="{{ $cliente->foto }}"> </input>
            <img src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto do cliente" width="50">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="1" {{ $cliente->status ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ !$cliente->status ? 'selected' : '' }}>Inativo</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>
