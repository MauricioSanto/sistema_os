
<!DOCTYPE html>
<html>
    <head>
        <title>Editar Produto</title>
    </head>
    <body>
        <h1>Editar Produto</h1>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="">Nome:</label>
            <input type="text" name="nome" id= "nome" value="{{ $produto->nome }}">
            <label for="">Valor:</label>
            <input type="numeric" name="valor" id="valor" value="{{ $produto->valor }}">
            <label for="">Descrição:</label>
            <input name="descricao"  id="descricao" value="{{ $produto->descricao }}"> </input>
            <button type="submit">Atualizar</button>
        </form>
    </body>
</html>
