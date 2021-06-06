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
        include '../assets/conexao.inc';
        try{
          $sql = "INSERT INTO insc_ctt VALUES (NULL, '$this->assunto', '$this->mensagem', '$this->email', '$this->data', 0)";
          $res = mysqli_query($conexao, $sql);
          mysqli_close($conexao);
          header("location: ../index.html");
        }catch(Exception $error){
          echo "Erro: ";
          echo mysqli_error($conexao);
          mysqli_close($conexao);
          echo "<br> <a href='../index.html>Voltar para a página inicial</a>'";
        }
      }
    }
    $obj_usuario = new usuario($assunto, $mensagem, $email, $data);
  }
?>