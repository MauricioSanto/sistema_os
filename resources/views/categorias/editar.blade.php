<!DOCTYPE html>
<html>
    <head>
        <title>Editar Categoria</title>
    </head>
    <body>
        <h1>Editar Produto</h1>
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="">TIPO:</label>
            <input type="text" name="tipo" id= "tipo" value="{{ $categoria->tipo }}">
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>