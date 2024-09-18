<!DOCTYPE html>
<html>
    <head>
        <title>Categorias</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <button><a href= "http://127.0.0.1:8000/">Página Inicial</a></button>
        <h1>Categorias</h1>
        <form action="{{ route('categorias.index') }}" method="post">
          @csrf
          <label for="">TIPO: </label>
          <input type="text" name="tipo" id="tipo">
          <button type="submit">Salvar</button>
        </form>
        <!--<a href="{{ route('produtos.create') }}">Cadastrar Produto</a>-->
        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TIPO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    
                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->tipo }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}">
                            <div>
                                <img src='https://img.icons8.com/?size=100&id=8rqSU6umQzpk&format=png&color=000000' width='35' height='35'>Editar</img>
                            </div>
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                        <img src='https://img.icons8.com/?size=100&id=57061&format=png&color=000000' width='35' height='35'>Excluir</img>
                                    </button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </body>
</html>