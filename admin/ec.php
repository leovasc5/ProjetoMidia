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
    <link href="../parceiros.css" rel="stylesheet">
    <link href="../button.css" rel="stylesheet">
    <link href="div.css" rel="stylesheet">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
<header class="header">
  <img src="../img\logo.png" id="logo1" title="Projeto Midia">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a id='QS' class="neg">ENTRE EM CONTATO</a></li>
    <li><a href="tc.php?<?php echo "num1=".$n1;?>" id='PA'>TRABALHE CONOSCO</a></li>
    <li><a href="equipe.php?<?php echo "num1=".$n1;?>" id='EQ'>EQUIPE</a></li>
    <li><a href="#c3" id='EQ'  onmouseover="this.style.backgroundColor='#ff0000'; this.style.color='#ffffff'" 
    onmouseout="this.style.backgroundColor='#ffffff';this.style.color='#353839'" onclick="location.href='destroy.php'">SAIR</a></li>
  </ul>
</header>
<br><br><br><br><br><br>
<h2>Mensagens não verificados</h2>
<?php

include 'conexao.inc';
$sql = "SELECT* FROM insc_ctt WHERE verificado = 0 ORDER BY data DESC ";
$res = mysqli_query($conexao, $sql);

if(mysqli_num_rows($res) == 0){
  echo "<center><h3 style='color: #353839'>Não há novas mensagens</h3></center>";
}

while($elemento = mysqli_fetch_row($res)){
    $id = $elemento[0];
    $assunto = $elemento[1];
    $mensagem = $elemento[2];
    $email = $elemento[3];
    $verificado = $elemento[4];
    $data = $elemento[4];

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
    <a href='ec_ver.php?num1=".$n1."&cod=".$id."'>
      <div class='box'>
          <h2>$assunto </h2>
          <h3>Enviado por <b>$email</b> em $dia de $mes de $ano</h3>
          <p>$mensagem</p>
      </div>
    </a>
    <br><br>
  ";
  }

echo "<h2>Mensagens verificadas</h2>";

include 'conexao.inc';
$sql_ver = "SELECT* FROM insc_ctt WHERE verificado = 1 ORDER BY data DESC ";
$res_ver = mysqli_query($conexao, $sql_ver);

if(mysqli_num_rows($res_ver) == 0){
  echo "<center><h3 style='color: #353839'>Não há mensagens verificadas</h3></center>";
}

  while($elemento_ver = mysqli_fetch_row($res_ver)){
    $id_ver = $elemento_ver[0];
    $assunto_ver = $elemento_ver[1];
    $mensagem_ver = $elemento_ver[2];
    $email_ver = $elemento_ver[3];
    $verificado_ver = $elemento_ver[5];
    $data_ver = $elemento_ver[4];

    $ctt_ver = "SELECT* FROM insc_ctt WHERE verificado = 1";
    $res_ctt_ver = mysqli_query($conexao, $ctt_ver);
    
    $dia_ver = substr($data_ver, 8);
    $mes_ver = substr($data_ver, 5, 2);
    $ano_ver = substr($data_ver, 0, 4);

    if($mes_ver == "01"){
      $mes_ver = "Janeiro";
    }elseif($mes_ver == "02"){
      $mes_ver = "Fevereiro";
    }elseif($mes_ver == "03"){
      $mes_ver = "Março";
    }elseif($mes_ver == "04"){
      $mes_ver = "Abril";
    }elseif($mes_ver == "05"){
      $mes_ver = "Maio";
    }elseif($mes_ver == "06"){
      $mes_ver = "Junho";
    }elseif($mes_ver == "07"){
      $mes_ver = "Julho";
    }elseif($mes_ver == "08"){
      $mes_ver = "Agosto";
    }elseif($mes_ver == "09"){
      $mes_ver = "Setembro";
    }elseif($mes_ver == "10"){
      $mes_ver = "Outubro";
    }elseif($mes_ver == "11"){
      $mes_ver = "Novembro";
    }elseif($mes_ver == "12"){
      $mes_ver = "Dezembro";
    }

    echo "
    <a href='ec_veri.php?num1=".$n1."&cod=".$id_ver."'>
      <div class='box'>
          <h2>$assunto_ver </h2>
          <h3>Enviado por <b>$email_ver</b> em $dia_ver de $mes_ver de $ano_ver</h3>
          <p>$mensagem_ver</p>
      </div>
    </a>
    <br><br>
  ";
}
?>