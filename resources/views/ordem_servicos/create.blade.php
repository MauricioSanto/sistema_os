<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Ordem de Serviço</title>
    </head>
    <body>
        <h1>Nova Ordem de Serviço</h1>

        <form action="{{ route('ordem_servicos.store') }}" method="POST">
            @csrf
            <label>SERVIÇO:</label>
            <select name="servico_id" id="servico_id">
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}">{{ $servico->tipo }}</option>
                @endforeach
            </SELECT>

            <label for="">CLIENTE:</label>
            <select name="cliente_id" id="cliente_id">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome}}</option>
                @endforeach
            </SELECT>
           
            <label for="">EMPRESA:</label>
            <select name="empresa_id" id="empresa_id">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->razao_social }}</option>
                @endforeach
            </SELECT>

            <label>DATA INICIAL:</label>
            <input type="date" name="data_inicial">

            <label>DATA FINAL:</label>
            <input type="date" name="data_final">

            <label>VALOR:</label>
            <input type="number" name="valor">

            <label for="">STATUS:</label>
            <select name="status" id="status">
                <option value="1">Concluido</option>
                <option value="0">Em andamento</option>  
            </select>
            
        </form>
    </body>
</html>