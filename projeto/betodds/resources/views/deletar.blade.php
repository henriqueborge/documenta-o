<!DOCTYPE html>
<html>
    <Header>
        <title>ViaCEP Webservice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Adicionando Javascript -->
        <script>
        
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
                document.getElementById('ibge').value=("");
        }
    
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
                document.getElementById('ibge').value=(conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {
    
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
                    document.getElementById('ibge').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <meta charset="UTF-8">
        <style>
            body {
        background-color: green;
    }
    h1 {
        background-color: #00b33c;
    }
    p {
        background-color: #FFFFFF;
    }
.border{
    border-width: 30px; // Estiliza a sua largura
    border-style: solid; // Estiliza seu estilo
    border-color:  blue;
}
                .container2{
                    position: absolute;
                    width: 80%;
                    left: 10%;
                    top: 10%;
                }
            </style>
        
    </Header>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary" >
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Betodds</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">odds</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Outros
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
              </div>
            </div>
          </nav>
          <form action="{{route('deletar',$cliente[0]->id)}}" method="delete">
            @csrf
          <div class="container">
            <div class="col-md-6">
              <label for="inputnome4" class="form-label">Nome</label>
              <input type="text" name="nome" class="form-control" id="inputnome" value="{{$cliente[0]->nome}}">
            </div>
            <div>
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="inputEmail4" value="{{$cliente[0]->email}}">
            </div>
            
            <div class="col-12">
              <label for="inputAddress" class="form-label" >Telefone</label>
              <input type="text" name="telefone" class="form-control" id="inputAddress" placeholder="(63) 984686808" value="{{$cliente[0]->telefone}}">
            </div>
           
            <div class="col-12">
              <label for="inputAddress2" class="form-label">CPF</label>
              <input type="text" name="cpf" class="form-control" id="inputAddress2" placeholder="111.111.111-2" value="{{$cliente[0]->cpf}}">
            </div>
      
        
          <!-- Inicio do formulario -->
         
      
            <label class="form-label">Cep:
            <input class="form-control" name="cep" value="{{$cliente[0]->cep}}" type="text" id="cep" value="" size="120" maxlength="9"
                onblur="pesquisacep(this.value);" /></label><br />
            <label class="form-label">Rua:
            <input class="form-control" name="rua" type="text" id="rua" size="120" value="{{$cliente[0]->rua}}"/></label><br />
            <label class="form-label">Bairro:
            <input class="form-control" name="bairro" type="text" id="bairro" size="120" value="{{$cliente[0]->bairro}}"/></label><br />
            <label class="form-label">Cidade:
            <input class="form-control" name="cidade" type="text" id="cidade" size="120" value="{{$cliente[0]->cidade}}"/></label><br />
            <label class="form-label">Estado:
            <input class="form-control" name="uf" type="text" id="uf" size="120" value="{{$cliente[0]->uf}}"/></label><br />
            <label class="form-label">Numero:
            <input class="form-control" name="numero" type="text" id="uf" size="120" value="{{$cliente[0]->numero}}"/></label><br />
            <label class="form-label">
            <input class="form-control" name="ibge" type="HIDDEN" id="ibge" size="120" /></label><br />
            <label class="form-label">Complemento:
            <input class="form-control" name="complemento" type="text" id="ibge" size="120" value="{{$cliente[0]->complemento}}"/></label><br />
        
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
        </div>
        </form>
    </body>
</html>