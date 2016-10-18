<?php
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['user']) ) {
  //Destrói
  session_destroy();

  //Limpa
  unset ($_SESSION['user']);

  //autenticado
  echo  "<script>alert('Para fazer login, digite seu e-mail do usuário e sua senha');
        window.location='../';
        </script>";
}

include '../conf/conexao.php';
$conn = conectar();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title></title>
  <!--  Configuração do Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.6//css/bootstrap-theme.min.css">
  <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
  <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>

  <script src="../js/cidades-estados-v0.2.js"></script>
  <script src="../js/mascara.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="../css/input_css.css">
</head>
<body>
<div class="row">
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="title">Cadastro de Clientes</h2>
      <div class="row">
        <div class="form-group col-md-4">
          <form class="" action="CRUD_cliente.php" method="post">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" value="" placeholder="Nome do Cliente" required="">
            <label for="sexo">Sexo</label>
            <select class="form-control" name="sexo">
              <option value="não imformado">Selecione uma opção</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outros">Outros</option>
            </select>
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" class="form-control" value="" placeholder="Ex: (00) 0000-0000" onkeyup="criaMascara(this, '(##) ####-####');" required="">
            <label for="tel">Celular</label>
            <input type="text" name="celular" class="form-control" value="" placeholder="Ex: (00) 00000-0000" onkeyup="criaMascara(this, '(##) #####-####');">
        </div>
        <div class="form-group col-md-4">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value="" placeholder="Ex: exemplo@exemplo.com">
          <label for="rg">RG</label>
          <input type="text" name="rg" class="form-control" value="" placeholder="Ex: AA00000000">
          <label for="cpf">CPF</label>
          <input type="text" name="cpf" class="form-control" value="" placeholder="Ex: 000.000.000-00" required="" onkeyup="criaMascara(this, '###.###.###-##');">
          <label for="data_nasc">Data de Nascimento</label>
          <input type="date" name="data_nasc" class="form-control" value="">
        </div>
        <div class="form-group col-md-4">
          <h2 style="color:#e02c04">Endereço</h2>
          <div class="duo">
            <div class="col-md-8">
              <label for="rua">Rua</label>
              <input type="text" name="rua" class="form-control" placeholder="Nome da Rua" required="">
            </div>
            <div class="col-md-4">
              <label for="numero">Número</label>
              <input type="text" name="numero" class="form-control" required="">
            </div>
          </div>
          <div class="duo">
            <div class="col-md-6">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" class="form-control" placeholder="Nome do Bairro" required="">
            </div>
            <div class="col-md-6">
              <label for="cidade">Estado</label>
              <select id="estado" name="estado" class="form-control" required ></select>
            </div>
          </div>
          <br>
          <div class="duo">
            <div class="col-md-6">
              <label for="cep">CEP</label>
              <input type="text" name="cep" class="form-control" placeholder="Ex: 00000-000" required="" onkeyup="criaMascara(this, '#####-###');">
            </div>
            <div class="col-md-6">
              <label for="estado">Cidade</label>
                <select id="cidade" name="cidade" class="form-control" required ></select>
            </div>
          </div>
          <br>
          <br>
          <a href="/www/RestServ/pages"><button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button></a>
          <button type="submit" class="btn btn-success" name="tipo" value="add">Concluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row close -->
<center><img src="../img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
</body>
</html>