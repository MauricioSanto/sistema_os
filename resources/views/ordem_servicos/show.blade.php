<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        @foreach($ordem_servicos as $ordem_servico)
            <h1>{{ $ordem_servico->servico->tipo }}</h1>
            <p>{{ $ordem_servico->cliente->nome }}</p>
            <p>{{ $ordem_servico->empresa->razao_social }}</p>
            <p>{{ $ordem_servico->data_inicial}}</p>
            <p>{{ $ordem_servico->data_final}}</p>
            <p>Valor: {{ $ordem_servico->valor }}</p>
            <p>{{ $ordem_servico->status}}</p>
        @endforeach
        <a href="{{ route('ordem_servicos.edit', $ordem_servico->id) }}">Editar</a>
    </body>
</html>