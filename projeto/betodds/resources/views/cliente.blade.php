<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class="col-12">
        <a href="{{route('index')}}"><button type="submit" class="btn btn-primary">voltar</button></a>
        
      </div>
      <br>
 
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($cliente as $cliente)
    <tr>
      <th scope="row">{{$cliente->id}}</th>
      <td>{{$cliente->nome}}</td>
      <td>{{$cliente->email}}</td>
      <td>{{$cliente->telefone}}</td>
      <td>{{$cliente->cpf}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    </body>
</html>