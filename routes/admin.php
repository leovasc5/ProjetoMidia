<?php
    if(isset($_POST['passe']) and isset($_POST['senha'])){
        $passe = filter_input(INPUT_POST, 'passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = md5($senha);

        include '../assets/conexao.inc';

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
            mysqli_close($conexao);
            header("Location: ../admin/dashboard/ec.php?num1=$num");
        }else{
            echo "Erro: ";
            echo mysqli_error($conexao);
            mysqli_close($conexao);
            echo "<br> <a href='../index.html>Voltar para a página inicial</a>'";
        }
    }
    
?>