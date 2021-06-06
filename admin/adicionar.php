<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../alert1.js"></script>
    <link rel="stylesheet" href="../alert1.css">
    <title>ADM - Projeto Midia</title>
</head>
<body>
    
</body>
</html>

<?php

  if(isset($_POST['nome']) and isset($_POST['passe']) and isset($_POST['senha'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passe = filter_input(INPUT_POST, 'passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_EMAIL);

    include 'conexao.inc';
    $sql_nome = "SELECT* FROM adms WHERE palavra_passe = '$passe'";
    $resultado = mysqli_query($conexao, $sql_nome);
    $numero = mysqli_num_rows($resultado);
    if($numero > 0){
      unset($username);
      echo "<script>
          function erro_formulario(){
            swal('Palavra-Passe repetida!', 'Não é possível ter dois administradores com a mesma Palavra-Passe.', 'warning');  
          }
          erro_formulario();
        </script>";
        header('Refresh: 4; URL=index.php');
    }else{
      $sql = "INSERT INTO adms VALUES (NULL, '$passe', '$senha', '$nome')";
      $res = mysqli_query($conexao, $sql);
      echo "<script>
      function envio_formulario(){
        swal('Membro Adicionado!', 'Passe as informações cadastradas para ele!', 'success');  
      }
      envio_formulario();
    </script>";
    header('Refresh: 4; URL=index.php');


    }
  }
