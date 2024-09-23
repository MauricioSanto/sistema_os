<!DOCTYPE html>
<html>
    <head>
        <title>Contato</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    </head>
    <body>
        <button><a href= "{{ route('pagina_inicial') }}">Página Inicial</a></button>
        <h1>Contato</h1>
        <form action="{{ route('contato.index') }}" method="post">
          @csrf
          <label for="">NOME: </label>
          <input type="text" name="Nome" id="Nome">
          <label for="">EMAIL: </label>
          <input type="text" name="Email" id="Email">
          <label for="">MENSAGEM: </label>
          <textarea name="Mensagem" id="Mensagem" cols="30" rows="10"></textarea>
          <button type="submit">Salvar</button>
        </form>
        <!--<a href="{{ route('produtos.create') }}">Cadastrar Produto</a>-->
        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif
        
    </body>
</html>