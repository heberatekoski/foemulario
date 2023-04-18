<?php
include ("conexao.php");


$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$genero=$_POST['genero'];
$datadenascimento=$_POST['datadenascimento'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$endereco=$_POST['endereco'];
try {
    $pdo = new PDO('mysql:host=localhost;dbname=formulario', $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $pdo->prepare('INSERT INTO cadastro (nome, email, telefone, genero, datadenascimento, cidade, estado, endereco)
    VALUES(:nome, :email, :telefone, :genero, :datadenascimento, :cidade, :estado, :endereco)');
    $stmt->execute(array(
      ':nome' => "$nome",
      ':email' => "$email",
      ':telefone' => "$telefone",
      ':genero' => "$genero",
      ':datadenascimento' => "$datadenascimento",
      ':cidade' => "$cidade",
      ':estado' => "$estado",
      ':endereco' => "$endereco"
    ));
 
    echo "Registrado com sucesso";
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
?>
