<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Empresas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <button><a href= "http://127.0.0.1:8000/">Página Inicial</a></button>
        <h1>Empresas</h1>
        <form action="{{ route('empresas.index') }}" method="post">
          @csrf
          <label for="">RAZÃO SOCIAL: </label>
          <input type="text" name="razao_social" id="razao_social">
          <label for="">CNPJ:</label>
          <input type="text" name="cnpj" id="cnpj">
          <label for="">ENDEREÇO:</label>
          <input type="text" name="endereco" id="endereco">
          <label for="">TELEFONE:</label>
          <input type="text" name="telefone" id="telefone">
          <label for="">CEP:</label>
          <input type="text" name="cep" id="cep">
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
                    <th scope="col">RAZÂO SOCIAL</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">ENDEREÇO</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">CEP</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    
                    <tr>
                        <th scope="row">{{ $empresa->id }}</th>
                        <td>{{ $empresa->razao_social }}</td>
                        <td>{{ $empresa->cnpj }}</td>
                        <td>{{ $empresa->endereco }}</td>
                        <td>{{ $empresa->telefone }}</td>
                        <td>{{ $empresa->cep }}</td>
                        <td>
                            <button><a href="{{ route('empresas.edit', $empresa->id) }}">Editar</a></button>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </body>
</html>
