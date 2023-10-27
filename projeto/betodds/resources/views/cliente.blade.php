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
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
 
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
      <th scope="col">Cep</th>
      <th scope="col">UF</th>
      <th scope="col">Cidade</th>
      <th scope="col">Bairro</th>
      <th scope="col">Rua</th>
      <th scope="col">Numero</th>
      <th scope="col">Complemento</th>
      <th scope="col">Ação</th>
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
      <td>{{$cliente->cep}}</td>
      <td>{{$cliente->uf}}</td>
      <td>{{$cliente->cidade}}</td>
      <td>{{$cliente->bairro}}</td>
      <td>{{$cliente->rua}}</td>
      <td>{{$cliente->numero}}</td>
      <td>{{$cliente->complemento}}</td>
      <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <a href="{{route('editar',$cliente->id)}}"><button type="button" class="btn btn-danger">Editar</button></a>
  <a href="{{route('deletar',$cliente->id)}}"><button type="button" class="btn btn-warning">Deletar</button></a>
</div></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </body>
</html>