<?php
session_start();
include_once('conectar.php');


$nome = $_POST['nome'];

if(is_numeric($nome) OR !preg_match('/^[a-zA-Z0-9]+/', $nome)){
    
    $_SESSION['loginError'] = '• Nome inválido';
    header("Location:cadastro.php");
    $a=0;

}else{
    $nome = $_POST['nome'];
    $a=1;
}


if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    
    $_SESSION['emailError'] = '• E-mail inválido';
    header("Location:cadastro.php");
     $b=0;
}else{
    $email = $_POST['email'];
    $b=1;
    $c=$a+$b;
    
}

$verificar = "SELECT * FROM cadastro WHERE email='$email' ";
$result = mysqli_query($conn,$verificar);
$resultado = mysqli_fetch_assoc($result);

if(isset($resultado)){
    $_SESSION['repeatError'] = '• E-mail já cadastrado';
    header("Location:cadastro.php");

    $c=0;
}


if($c==2){
$email=$_POST['email'];
$senha =$_POST['senha'];


$dados = "INSERT INTO cadastro (nome,email,senha) VALUES ('$nome','$email','$senha')";
$inserir = mysqli_query($conn,$dados);
header("Location:login.php");

}


?>