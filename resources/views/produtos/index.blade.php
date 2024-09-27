<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Produtos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        
        <button><a href="{{ route('pagina_inicial') }}" >Página Inicial</a></button>
        <h1>Produtos</h1>
        <form action="{{ route('produtos.index') }}" method="post">
        @csrf
        <label for="">NOME: </label>
        <input type="text" name="nome" id="nome">
        <label for="">VALOR:</label>
        <input type="text" name="valor" id="valor">
        <label for="">DESCRIÇÂO:</label>
        <input type="text" name="descricao" id="descricao">
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
                    <th scope="col">NOME</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">DESCRIÇÂO</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    
                    <tr>
                        <th scope="row">{{ $produto->id }}</th>
                        <td>{{ $produto->nome }}</td>
                        <td>R${{ $produto->valor }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>
                            <button>
                                <a href="{{ route('produtos.edit', $produto->id) }}">
                                    <div>
                                        <img src='https://img.icons8.com/?size=100&id=8rqSU6umQzpk&format=png&color=000000' width='35' height='35'>Editar</img>
                                    </div>
                                </a>
                            </button>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
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
