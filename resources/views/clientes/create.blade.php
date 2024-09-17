<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Cadastro Clientes</title>
    </head>
    <body>
        <h1>Novo Cliente</h1>

        <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>NOME:</label>
            <input type="text" name="nome">
            <label>DATA NASCIMENTO:</label>
            <input type="date" name="data_nascimento">
            <label for="">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            <label>STATUS:</label>
            <input type="boolean" name="status"></input>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>