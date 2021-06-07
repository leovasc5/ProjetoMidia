<?php
session_start();
if(isset($_SESSION["numLogin"])){

    $n1 = $_GET['num1'];
    $n2 = $_SESSION['numLogin'];

        if($n1 != $n2){
          echo "<br><br><br><br><br><br><br><br><br><br><center><a href='index.php'>
          <img src='../img/logo.png'></a>
          <h2 style='font-family: Charcoal, sans-serif;'>Hummm... parece que você 
          tentou acessar o PMD-Admin sem estar logado...</h2>
          <a href='index.php'><h1 style='font-family: Charcoal, sans-serif;'>
          Entrar</h1></center>";
            exit;
        }
}else{
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/logo.ico" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="../../css/index.css" rel="stylesheet" type="text/css">
    <link href="../../css/bar.css" rel="stylesheet" type="text/css">
    <link href="../../css/parceiros.css" rel="stylesheet">
    <link href="../../css/forms.css" rel="stylesheet">
    <link href="../../css/admin/div.css" rel="stylesheet">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
<header class="header">
  <img src="../../img\logo.png" id="logo1" title="Projeto Midia">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="ec.php?<?php echo "num1=".$n1;?>" id='QS'>ENTRE EM CONTATO</a></li>
    <li><a href="tc.php?<?php echo "num1=".$n1;?>" id='PA'>TRABALHE CONOSCO</a></li>
    <li><a class="neg"id='EQ'>EQUIPE</a></li>
    <li><a href="#c3" id='EQ'  onmouseover="this.style.backgroundColor='#ff0000'; this.style.color='#ffffff'" 
    onmouseout="this.style.backgroundColor='#ffffff';this.style.color='#353839'" onclick="location.href='destroy.php'">SAIR</a></li>
  </ul>
</header>
<br><br><br><br><br><br>
<h2>Equipe</h2>
<?php

include '../../assets/conexao.inc';
$meu_cod = $_SESSION['codigo'];

$sql = "SELECT* FROM adms WHERE id <> '$meu_cod'";
$res = mysqli_query($conexao, $sql);

if(mysqli_num_rows($res) == 0){
  echo "<center><h3 style='color: #353839'>Não há ninguém na equipe</h3></center>";
}

while($elemento = mysqli_fetch_row($res)){
    $id = $elemento[0];
    $passe = $elemento[1];
    $nome = $elemento[3];

      echo "
    <a href='equipe_excluir.php?num1=".$n1."&cod=".$id."'>
      <div class='box'>
          <p><b>Nome: </b>$nome </p>
          <p><b>Palavra-Passe: </b>$passe</p>
          <p><b>ID (Banco de Dados): </b>0$id </p>
      </div>
    </a>
    <br><br>
  ";
}
?>

<br><br>

<div id="center" class="login-box">
    <h2>ADICIONAR MEMBRO</h2>
    <form name="" action="controller/adicionar.php?num1=<?php echo $n1;?>" method='POST'>
      <div class="user-box">
        <input type="text" name="nome" maxlenght="32" required>
        <label>Nome</label>
      </div>
      <div class="user-box">
        <input type="text" name="passe" maxlenght="32"  required>
        <label>Palavra-Passe</label>
      </div>
      <div class="user-box">
        <input type="password" name="senha" maxlenght="32" required>
        <label>Senha</label>
      </div>
      <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Adicionar
      </button>
    </form>
  </div>
  <br><br>