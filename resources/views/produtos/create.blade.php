<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produto Cadastro</title>
    </head>
    <body>
        <h1>Novo Produto</h1>

        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <label>Nome:</label>
            <input type="text" name="nome">
            <label>Valor:</label>
            <input type="text" name="valor">
            <label>Descrição:</label>
            <textarea name="descricao"></textarea>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>