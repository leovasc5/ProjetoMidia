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
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="../index.css" rel="stylesheet" type="text/css">
    <link href="../bar.css" rel="stylesheet" type="text/css">
    <link href="../carousel.css" rel="stylesheet">
    <link href="../parceiros.css" rel="stylesheet">
    <link href="button.css" rel="stylesheet">
    <link href="div.css" rel="stylesheet">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
<header class="header">
  <img src="../img\logo.png" id="logo1" title="Projeto Midia">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="equipe.php?<?php echo 'num1='.$n1; ?>" id='QS' class="neg">VOLTAR</a></li>
    <li><a href="#c2" id='EQ' onmouseover="this.style.backgroundColor='#ff0000'; this.style.color='#ffffff'" 
    onmouseout="this.style.backgroundColor='#ffffff';this.style.color='#353839'" onclick="location.href='destroy.php'">SAIR</a></li>
  </ul>
</header>
<br><br><br><br><br><br><br>

<div class = 'login-box'>
<form name="mensagem" action="<?php echo $_SERVER['PHP_SELF'].'?num1='.$n1.'&cod='.$_GET['cod']?>" method='POST'>
<?php

$codigo = $_GET['cod'];
include 'conexao.inc';
$sql = "SELECT* FROM adms WHERE id = $codigo";
$res = mysqli_query($conexao, $sql);

if(mysqli_num_rows($res) == 0){
  echo "<center><h3 style='color: #353839'>Não há novas mensagens</h3></center>";
}

while($elemento = mysqli_fetch_row($res)){
    $id = $elemento[0];
    $passe = $elemento[1];
    $nome = $elemento[3];

    $eq = "SELECT* FROM adms WHERE id = $id";
    $res_eq = mysqli_query($conexao, $eq);
    while($elemento_eq = mysqli_fetch_row($res_eq)){
      $id = $elemento_eq[0];
      $passe = $elemento_eq[1];
      $nome = $elemento_eq[3];
    }

    echo "

    <a>
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
<center>
  <input type='password' name='senha' placeholder="Senha Geral"></input><br><br>
<button name='excluir'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>  
        EXCLUIR <?php echo $nome;?>
      </button>
</center>
    </form>
</div>
<br><br><br>


<?php

if(isset($_POST['excluir']) and isset($_POST['senha'])){
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  include 'conexao.inc';
  $sql = "SELECT* FROM adm_geral WHERE senha = '$senha'";
  $res = mysqli_query($conexao, $sql);
  $linha = mysqli_affected_rows($conexao);

  if($linha > 0){
    $sql_exclude = "DELETE FROM adms WHERE id = $codigo";
    $res_exclude = mysqli_query($conexao, $sql_exclude);
    header("Location:equipe.php?num1=".$n1);
  }else{
      header("Location:destroy.php");
    }
}
