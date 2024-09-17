<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        @foreach($servicos as $servico)
            <h1>{{ $servico->tipo }}</h1>
            <p>Valor: {{ $servico->valor }}</p>
            <p>{{ $servico->empresa->razao_social }}</p>
            <p>{{ $servico->categoria->tipo}}</p>
            <p>{{ $servico->status}}</p>
        @endforeach
        <a href="{{ route('servicos.edit', $servico->id) }}">Editar</a>
    </body>
</html>