<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Cadastro de Contato</title>
    </head>
    <body>
        <h1>Novo Contato</h1>

        <form action="{{ route('contato.store') }}" method="POST">
            @csrf
            <label>Nome:</label>
            <input type="text" name="Nome">
            <label>Email:</label>
            <input type="text" name="Email">
            <label>Mensagem:</label>
            <textarea name="Mensagem" id="Mensagem" cols="30" rows="10"></textarea>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>