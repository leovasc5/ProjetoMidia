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
    <link href="../../../css/index.css" rel="stylesheet" type="text/css">
    <link href="../../../css/bar.css" rel="stylesheet" type="text/css">
    <link href="../../../css/parceiros.css" rel="stylesheet">
    <link href="../../../css/admin/button.css" rel="stylesheet">
    <link href="../../../css/admin/div.css" rel="stylesheet">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
<header class="header">
  <img src="../img\logo.png" id="logo1" title="Projeto Midia">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="ec.php?<?php echo 'num1='.$n1; ?>" id='QS' class="neg">VOLTAR</a></li>
    <li><a href="#c2" id='EQ' onmouseover="this.style.backgroundColor='#ff0000'; this.style.color='#ffffff'" 
    onmouseout="this.style.backgroundColor='#ffffff';this.style.color='#353839'" onclick="location.href='destroy.php'">SAIR</a></li>
  </ul>
</header>
<br><br><br><br><br><br><br><br><br>

<div class = 'login-box'>
<form name="mensagem" action="<?php echo $_SERVER['PHP_SELF'].'?num1='.$n1.'&cod='.$_GET['cod']?>" method='POST'>
    <?php

    include '../../../assets/conexao.inc';

    $codigo = $_GET['cod'];

    $sql_ver = "SELECT* FROM insc_ctt WHERE id = $codigo ";
    $res_ver = mysqli_query($conexao, $sql_ver);

  while($elemento_ver = mysqli_fetch_row($res_ver)){
    $id_ver = $elemento_ver[0];
    $assunto_ver = $elemento_ver[1];
    $mensagem_ver = $elemento_ver[2];
    $email_ver = $elemento_ver[3];
    $verificado_ver = $elemento_ver[4];
    $data_ver = $elemento_ver[5];

    $ctt_ver = "SELECT* FROM insc_ctt WHERE verificado = 1";
    $res_ctt_ver = mysqli_query($conexao, $ctt_ver);
    while($elemento_ctt_ver = mysqli_fetch_row($res_ctt_ver)){
      $id_ver = $elemento_ctt_ver[0];
      $assunto_ver = $elemento_ctt_ver[1];
      $mensagem_ver = $elemento_ctt_ver[2];
      $email_ver = $elemento_ctt_ver[3];
      $data_ver = $elemento_ctt_ver[4];
      $verificado_ver = $elemento_ctt_ver[5];
    }

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
<center>
<button name='verificar'>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        ANULAR VERIFICAÇÃO
      </button>
</center>
    </form>
</div>

<?php

    if(isset($_POST['verificar'])){
        try{
            include 'conexao.inc';
            $sql = "UPDATE insc_ctt SET verificado = 0 WHERE id = $codigo";
            $res = mysqli_query($conexao, $sql);
            header("Location:../ec.php?num1=$n1");
            echo mysqli_error($conexao);
        }catch (Exception $error){

        }
    }

?>