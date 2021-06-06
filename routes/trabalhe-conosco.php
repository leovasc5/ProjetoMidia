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
      include '../assets/conexao.inc';

      try{
        $sql = "INSERT INTO insc_tc VALUES (NULL, '$this->nome', '$this->idade', '$this->email', '$this->cidade', '$this->genero',
        '$this->area', '$this->voce', '$this->data', 0)";
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

  $obj_usuario = new usuario($nome, $idade, $email, $cidade, $genero, $area, $voce, $data);
  }
?>