<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../forms.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script src="../alert1.js"></script>
    <link rel="stylesheet" href="../alert1.css">
    <title>Login</title>
</head>
<body>
<br><br><br><br><br><br><br><br>
<div id="center" class="login-box" style="">
    <h2>LOGIN</h2>
    <form name="admin" action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
      <div class="user-box">
        <input type="text" name="passe" maxlenght="32" required>
        <label>Palavra-passe</label>
      </div>
      <div class="user-box">
        <input type="password" name="senha" maxlenght="32"  required>
        <label>Senha</label>
      </div>
    <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        ENTRAR
      </button>
    </form>
</div>
<br><br><br><br><br><br>
</body>
</html>

<script>
    function formulario_incorreto(){
        swal("Passe negado!", "Parece que você está perdido...", "warning");
        setTimeout(redirect, 3000);
    }
    
    function redirect(){
        window.location.href='../index.html';
    }
</script>

<?php
    if(isset($_POST['passe']) and isset($_POST['senha'])){
        $passe = filter_input(INPUT_POST, 'passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        include 'conexao.inc';

        $sql = "SELECT* FROM adms WHERE palavra_passe = '$passe' AND senha = '$senha'";
        $res = mysqli_query($conexao, $sql);
        $linha = mysqli_affected_rows($conexao);

        if($linha > 0){
            $num = rand(100000,900000);
            session_start();
            $_SESSION['numLogin'] = $num;
    
            //PUXANDO DADOS DO USUÁRIO
            $sql_dados = "SELECT* FROM adms WHERE palavra_passe = '$passe'";
            $resultado_dados = mysqli_query($conexao, $sql_dados);
            
            while($elemento = mysqli_fetch_row($resultado_dados)){
                $_SESSION['codigo'] = $elemento[0];
                $_SESSION['passe'] = $elemento[1];
                $_SESSION['senha'] = $elemento[2];
                $_SESSION['nome'] = $elemento[3];
            }
            //echo mysqli_error($conexao);
            mysqli_close($conexao);

            header("Location:ec.php?num1=$num");
        }else{
            echo "<script>
                formulario_incorreto();
            </script>";
        }
    }
    
?>