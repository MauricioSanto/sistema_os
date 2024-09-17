<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        @foreach($categorias as $categoria)
        
            <h1>{{ $categoria->tipo }}</h1>
           
        @endforeach
        <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
    </body>
</html>