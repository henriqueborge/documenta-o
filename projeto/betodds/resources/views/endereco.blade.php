<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cep</th>
      <th scope="col">UF</th>
      <th scope="col">Cidade</th>
      <th scope="col">Bairro</th>
      <th scope="col">Rua</th>
      <th scope="col">Numero</th>
      <th scope="col">Complemento</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($endereco as $endereco)
    <tr>
      <th scope="row">{{$endereco->id}}</th>
      <td>{{$endereco->cep}}</td>
      <td>{{$endereco->uf}}</td>
      <td>{{$endereco->cidade}}</td>
      <td>{{$endereco->bairro}}</td>
      <td>{{$endereco->rua}}</td>
      <td>{{$endereco->numero}}</td>
      <td>{{$endereco->complemento}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    </body>
</html>