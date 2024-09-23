<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Serviços</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <button><a href= "{{ route('pagina_inicial') }}">Página Inicial</a></button>
        <h1>Serviços</h1>
        <form action="{{ route('servicos.index') }}" method="post">
          @csrf
          <label for="">:TIPO: </label>
          <input type="text" name="tipo" id="tipo">
          <label for="">VALOR R$:</label>
          <input type="text" name="valor" id="valor">
          <label for="">EMPRESA:</label>
          <select name="empresa_id" id="empresa_id">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->razao_social }}</option>
                @endforeach
          </select>
          <label for="">CATEGORIA:</label>
          <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->tipo }}</option>
                @endforeach
          </select>
          <label for="status">STATUS:</label>
            <select name="status" id="status">
                <option value="1">Concluido</option>
                <option value="0">Em andamento</option>  
            </select>
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
                    <th scope="col">VALOR</th>
                    <th scope="col">EMPRESA</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicos as $servico)
                    
                    <tr>
                        <th scope="row">{{ $servico->id }}</th>
                        <td>{{ $servico->tipo }}</td>
                        <td>{{ $servico->valor }}</td>
                        <td>{{ $servico->empresa->razao_social}}</td>
                        <td>{{ $servico->categoria->tipo }}</td>
                        <td>
                            @if ($servico->status)
                                Concluido
                            @else
                                Em andamento
                            @endif
                        </td>
                        <td>
                            <button>
                                <a href="{{ route('servicos.edit', $servico->id) }}">
                                    <div>
                                        <img src='https://img.icons8.com/?size=100&id=8rqSU6umQzpk&format=png&color=000000' width='35' height='35'>Editar</img>
                                    </div>
                                </a>
                            </button>
                            <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <img src='https://img.icons8.com/?size=100&id=57061&format=png&color=000000' width='35' height='35'>Excluir</img>
                                </button>
                            </form>
                            <form action="{{ route('servicos.atualizarStatus', $servico->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit">
                                    <img src='https://img.icons8.com/?size=48&id=63322&format=png' width='35' height='35'>atualizar</img>
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </body>
</html>
