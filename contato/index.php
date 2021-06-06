<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/forms.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="../css/bar.css" rel="stylesheet" type="text/css">
    <script src="../js/alert1.js"></script>
    <link rel="stylesheet" href="../css/alert1.css">
    <title>Entre em Contato</title>
</head>
<body>
    
<header class="header">
  <img src="../img\logo.png" id="logo1" title="Projeto Midia" onclick="location.href='../index.html'">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="../index.html" id='QS' onclick="n1()">VOLTAR PARA HOME</a></li>
    <li onmouseover="this.style.backgroundColor='#f4f4f4'" onmouseout="this.style.backgroundColor='#ffffff'"
     style="cursor:pointer"><a id="config_sm" href="https://linka.ai/projetomidia" target="_blank" title="Saiba mais">⠀
     <img src="../img/saiba_mais.png" width="55px">⠀</img></a></li>
  </ul>
</header>
<br><br><br><br><br><br>

<div id="center" class="login-box">
    <h2>ENTRE EM CONTATO</h2>
    <form name="contato" action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
      <div class="user-box">
        <input type="text" name="assunto" maxlenght="128" required>
        <label>Assunto</label>
      </div>
      <div class="user-box">
        <input type="text" name="email" maxlenght="64"  required>
        <label>Seu E-mail</label>
      </div>
      <div class="user-box">
        <input type="text" name="mensagem" maxlenght="512" required>
        <label>Mensagem</label>
      </div>
      <button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Enviar
      </button>
    </form>
  </div>
  <br><br>
  
</body>
</html>

<script>
function formulario_enviado(){
  swal("Obrigado por nos contatar!", "Caso necessário, entraremos em contato com você pelo e-mail.", "success");
}

function formulario_incompleto(){
  swal("Formulário incompleto!", "Preencha todos os campos", "warning");
}
</script>

<?php

if(isset($_POST['assunto']) and isset($_POST['mensagem']) and isset($_POST['email'])){
  $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  
  $t=time();
  $data = date("Y-m-d",$t);
  
  class usuario{
      private $assunto;
      private $mensagem;
      private $email;
      private $data;
      
      public function __construct($assunto, $mensagem, $email, $data){
          $this->setAssunto($assunto);
          $this->setMensagem($mensagem);
          $this->setEmail($email);
          $this->setData($data);
          $this->atualizarBD();
      }

      public function setAssunto($assunto){
          $this->assunto = $assunto;
      }

      public function setMensagem($mensagem){
          $this->mensagem = $mensagem;
      }

      public function setEmail($email){
          $this->email = $email;
      }

      public function setData($data){
        $this->data = $data;
      }

      public function atualizarBD(){
        include 'conexao.inc';

        try{
          $sql = "INSERT INTO insc_ctt VALUES (NULL, '$this->assunto', '$this->mensagem', '$this->email', '$this->data', 0)";
          $res = mysqli_query($conexao, $sql);
          echo "<script>
            formulario_enviado();
          </script>";
          echo mysqli_error($conexao);
        }catch(Exception $error){
          echo "<script>
            function erro_formulario(){
              swal('Erro interno!', 'Informe ao desenvolvedor: ".mysqli_error($conexao)."', 'warning');  
            }
          </script>";
        }
      }
    }
    $obj_usuario = new usuario($assunto, $mensagem, $email, $data);
  }
?>

