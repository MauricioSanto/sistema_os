<!DOCTYPE html>
<html>
    <head>
        <title>Editar Serviço</title>
    </head>
    <body>
        <h1>Editar Serviço</h1>
        <form action="{{ route('servicos.update', $servico->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="">TIPO:</label>
            <input type="text" name="tipo" id= "tipo" value="{{ $servico->tipo }}">
            <label for="">VALOR:</label>
            <input type="numeric" name="valor" id="valor" value="{{ $servico->valor }}">
            <label for="empresa_id">EMPRESA:</label>
            <select name="empresa_id" id="empresa_id">
                @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $servico->empresa_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->razao_social }}
                    </option>
                @endforeach
            </select>
            <label for="categoria_id">CATEGORIA:</label>
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $servico->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->tipo }}
                    </option>
                @endforeach
            </select>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="1" {{ $servico->status ? 'selected' : '' }}>Concluido</option>
                <option value="0" {{ !$servico->status ? 'selected' : '' }}>Em andamento</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>