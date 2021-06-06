<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico" />
    <link href="forms.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="bar.css" rel="stylesheet" type="text/css">
    <script src="alert1.js"></script>
    <link rel="stylesheet" href="alert1.css">
    <title>Entre em Contato</title>
</head>
<body>
    
<header class="header">
  <a href="index.html"><img src="img\logo.png" id="logo1" title="Projeto Midia"></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="index.html" id='QS' onclick="n1()">VOLTAR PARA HOME</a></li>
    <li onmouseover="this.style.backgroundColor='#f4f4f4'" onmouseout="this.style.backgroundColor='#ffffff'"
     style="cursor:pointer"><a id="config_sm" href="https://linka.ai/projetomidia" target="_blank" title="Saiba mais">⠀
     <img src="img/saiba_mais.png" width="55px">⠀</img></a></li>
  </ul>
</header>
<br><br><br><br><br><br>

<div id="center" class="login-box">
    <h2>TRABALHE CONOSCO</h2>
    <form name="trabalhe_conosco"  action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
      <div class="user-box">
        <input type="text" name="nome" minlength="3" maxlength="128" required>
        <label>Nome</label>
      </div>
      <div class="user-box">
        <input type="text" name="idade" onkeypress="validate(event)" maxlength="2" required>
        <label>Idade</label>
      </div>
      <div class="user-box">
        <input type="text" name="email"  minlength="3" maxlength="64" required>
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="text" name="cidade" minlength="3" maxlength="64" required>
        <label>Cidade</label>
      </div>
      <div class="user-box">
        <input type="text" name="genero" minlength="3" maxlength="32" required>
        <label>Gênero</label>
      </div>
      <div class="user-box">
        <input type="text" name="area_de_atuacao"  minlength="3" maxlength="64" required>
        <label>Área de Atuação</label>
      </div>
      <div class="user-box">
        <input type="text" name="voce"  minlength="3" maxlength="264" required>
        <label>Nos conte mais sobre você</label>
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
  <br><br><br>
</body>
</html>

<script>
function validate(evt) {
  var theEvent = evt || window.event;

  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function formulario_enviado(){
  swal("Obrigado!", "Entraremos em contato com você pelo e-mail.", "success");
}

function formulario_incompleto(){
  swal("Formulário incompleto!", "Preencha todos os campos", "warning");
}

</script>

<?php

  if(isset($_POST['nome']) and isset($_POST['idade']) and isset($_POST['email']) and isset($_POST['cidade']) and isset($_POST['genero'])
  and isset($_POST['voce'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $area = filter_input(INPUT_POST, 'area_de_atuacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $voce = filter_input(INPUT_POST, 'voce', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $t=time();
    $data = date("Y-m-d",$t);

  class usuario{
    private $nome;
    private $idade;
    private $email;
    private $cidade;
    private $genero;
    private $area;
    private $voce;
    
    public function __construct($nome, $idade, $email, $cidade, $genero, $area, $voce, $data){
      $this->setNome($nome);
      $this->setIdade($idade);
      $this->setEmail($email);
      $this->setCidade($cidade);
      $this->setGenero($genero);
      $this->setArea($area);
      $this->setVoce($voce);
      $this->setData($data);
      $this->atualizarBD(); 
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function setIdade($idade){
      $this->idade = $idade;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function setCidade($cidade){
      $this->cidade = $cidade;
    }

    public function setGenero($genero){
      $this->genero = $genero;
    }

    public function setArea($area){
      $this->area = $area;
    }

    public function setVoce($voce){
      $this->voce = $voce;
    }

    public function setData($data){
      $this->data = $data;
    }

    public function atualizarBD(){
      include 'conexao.inc';

      try{
        $sql = "INSERT INTO insc_tc VALUES (NULL, '$this->nome', '$this->idade', '$this->email', '$this->cidade', '$this->genero',
        '$this->area', '$this->voce', '$this->data', 0)";
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

  $obj_usuario = new usuario($nome, $idade, $email, $cidade, $genero, $area, $voce, $data);
  }
?>