<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        @foreach($clientes as $cliente)
            <h1>{{ $cliente->nome }}</h1>
            <p>{{ $cliente->data_nascimento }}</p>
            <p>{{ $cliente->foto }}</p>
            <p>{{ $cliente->status }}</p>
        @endforeach
        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
    </body>
</html>