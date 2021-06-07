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
    <link rel="shortcut icon" href="../../../img/logo.ico" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="../../../css/index.css" rel="stylesheet" type="text/css">
    <link href="../../../css/bar.css" rel="stylesheet" type="text/css">
    <link href="../../../css/carousel.css" rel="stylesheet">
    <link href="../../../css/parceiros.css" rel="stylesheet">
    <link href="../../../css/admin/button.css" rel="stylesheet">
    <link href="../../../css/admin/div.css" rel="stylesheet">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
<header class="header">
  <img src="../../../img\logo.png" id="logo1" title="Projeto Midia">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="tc.php?<?php echo 'num1='.$n1; ?>" id='QS' class="neg">VOLTAR</a></li>
    <li><a href="#c2" id='EQ' onmouseover="this.style.backgroundColor='#ff0000'; this.style.color='#ffffff'" 
    onmouseout="this.style.backgroundColor='#ffffff';this.style.color='#353839'" onclick="location.href='destroy.php'">SAIR</a></li>
  </ul>
</header>
<br><br><br><br><br><br><br>

<div class = 'login-box'>
<form name="mensagem" action="<?php echo $_SERVER['PHP_SELF'].'?num1='.$n1.'&cod='.$_GET['cod']?>" method='POST'>
    <?php

$codigo = $_GET['cod'];
include '../../../assets/conexao.inc';
$sql = "SELECT* FROM insc_tc WHERE id = $codigo";
$res = mysqli_query($conexao, $sql);

if(mysqli_num_rows($res) == 0){
  echo "<center><h3 style='color: #353839'>Não há novas mensagens</h3></center>";
}

while($elemento = mysqli_fetch_row($res)){
    $id = $elemento[0];
    $nome = $elemento[1];
    $idade = $elemento[2];
    $email = $elemento[3];
    $cidade = $elemento[4];
    $genero = $elemento[5];
    $area = $elemento[6];
    $voce = $elemento[7];
    $data = $elemento[8];
    $verificado = $elemento[9];

    $tc = "SELECT* FROM insc_tc WHERE verificado = 0";
    $res_tc = mysqli_query($conexao, $tc);
    while($elemento_tc = mysqli_fetch_row($res_tc)){
      $id = $elemento_tc[0];
      $nome = $elemento_tc[1];
      $idade = $elemento_tc[2];
      $email = $elemento_tc[3];
      $cidade = $elemento_tc[4];
      $genero = $elemento_tc[5];
      $area = $elemento_tc[6];
      $voce = $elemento_tc[7];
      $data = $elemento_tc[8];
      $verificado = $elemento_tc[9];
    }

    $dia = substr($data, 8);
    $mes = substr($data, 5, 2);
    $ano = substr($data, 0, 4);

    if($mes == "01"){
      $mes = "Janeiro";
    }elseif($mes == "02"){
      $mes = "Fevereiro";
    }elseif($mes == "03"){
      $mes = "Março";
    }elseif($mes == "04"){
      $mes = "Abril";
    }elseif($mes == "05"){
      $mes = "Maio";
    }elseif($mes == "06"){
      $mes = "Junho";
    }elseif($mes == "07"){
      $mes = "Julho";
    }elseif($mes == "08"){
      $mes = "Agosto";
    }elseif($mes == "09"){
      $mes = "Setembro";
    }elseif($mes == "10"){
      $mes = "Outubro";
    }elseif($mes == "11"){
      $mes = "Novembro";
    }elseif($mes == "12"){
      $mes = "Dezembro";
    }

    echo "
    <a href='tc_ver.php?num1=".$n1."&cod=".$id."'>
      <div class='box'>
          <p><b>Nome: </b>$nome </p>
          <p><b>Idade: </b>$idade anos</p>
          <p><b>E-mail: </b>$email </p>
          <p><b>Cidade: </b>$cidade </p>
          <p><b>Gênero: </b>$genero </p>
          <p><b>Área de Atuação: </b>$area </p>
          <p><b>Sobre a pessoa: </b>$voce </p>
          <p><b>Envio do formulário: </b>$dia de $mes de $ano </p>
      </div>
    </a>
    <br><br>
  ";
}
?>
<center>
<button name='verificar'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>  
        VERIFICAR
      </button>
</center>
    </form>
</div>
<br><br><br>

<?php

    if(isset($_POST['verificar'])){
        try{
            include '../../../assets/conexao.inc';
            $codigo = $_GET['cod'];
            $sql = "UPDATE insc_tc SET verificado = 1 WHERE id = $codigo";
            $res = mysqli_query($conexao, $sql);
            header("Location:../tc.php?num1=$n1");
        }catch (Exception $error){

        }
    }

?>