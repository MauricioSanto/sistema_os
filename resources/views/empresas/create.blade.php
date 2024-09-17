<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Empresa</title>
    </head>
    <body>
        <h1>Nova Empresa</h1>

        <form action="{{ route('empresas.store') }}" method="POST">
            @csrf
            <label>RAZÃO SOCIAL:</label>
            <input type="text" name="razao_social">
            <label>CNPJ:</label>
            <input type="string" name="cnpj">
            <label>ENDEREÇO:</label>
            <input type="text" name="endereco">
            <label>TELEFONE:</label>
            <input type="string" name="telefone">
            <label>CEP:</label>
            <input type="string" name="cep">
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>