<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Produtos</title>
    </head>
    <body>
        
        <button><a href= "http://127.0.0.1:8000/">Página Inicial</a></button>
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
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>
                            <button><a href="{{ route('produtos.edit', $produto->id) }}">Editar</a></button>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
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
