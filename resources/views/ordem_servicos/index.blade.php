<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Ordem de Serviço</title>
    </head>
    <body>
        <button><a href= "http://127.0.0.1:8000/">Página Inicial</a></button>
        <h1> Ordem de Serviço</h1>
        <form action="{{ route('ordem_servicos.index') }}" method="post">
          @csrf
          <label for="">SERVIÇO: </label>
          <select name="servico_id" id="servico_id">
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}">{{ $servico->tipo }}</option>
                @endforeach
          </select>
          <label for="">CLIENTE:</label>
          <select name="cliente_id" id="cliente_id">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
          </select>
          <label for="">EMPRESA:</label>
          <select name="empresa_id" id="empresa_id">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->razao_social }}</option>
                @endforeach
          </select>
          <label for="">DATA INICIAL:</label>
          <input type="date" name="data_inicial" id="data_inicial">
          <label for="">DATA FINAL:</label>
          <input type="date" name="data_final" id="data_final">
          <label for="">VALOR:</label>
          <input type="numeric" name="valor" id="valor">
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
                    <th scope="col">SERVIÇO</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">EMPRESA</th>
                    <th scope="col">DATA INICIAL</th>
                    <th scope="col">DATA FINAL</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordemservicos as $ordemservico)
                    
                    <tr>
                        <th scope="row">{{ $ordemservico->id }}</th>
                        <td>{{ $ordemservico->servico->tipo }}</td>
                        <td>{{ $ordemservico->cliente->nome }}</td>
                        <td>{{ $ordemservico->empresa->razao_social }}</td>
                        <td>{{ $ordemservico->data_inicial }}</td>
                        <td>{{ $ordemservico->data_final }}</td>
                        <td>{{ $ordemservico->valor }}</td>
                        <td>
                            @if ($ordemservico->status)
                                Concluido
                            @else
                                Em andamento
                            @endif
                        </td>
                        <td>
                            <button><a href="{{ route('ordem_servicos.edit', $ordemservico->id) }}">Editar</a></button>
                            <form action="{{ route('ordem_servicos.destroy', $ordemservico->id) }}" method="POST" style="display:inline;">
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
