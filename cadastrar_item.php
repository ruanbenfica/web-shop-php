<?php
session_start();
include_once('conectar.php');


$nome_produto = $_GET['nome_produto'];
$segmento = $_GET['segmento'];
$data_emprestimo = $_GET['data_emprestimo'];
$data_devolução = $_GET['data_devolução'];
$contato = $_GET['email_destinatario'];
$email_dono = $_SESSION['email_logado'];





if (isset($nome_produto)) {
    
    $verificar = "INSERT INTO itens (nome_produto,segmento,data_emprestimo,data_devolucao,email_destinatario,email_dono,situacao) VALUES
    ('$nome_produto','$segmento', '$data_emprestimo', '$data_devolução', '$contato', '$email_dono','Emprestado')";
    $result = mysqli_query($conn, $verificar);
    header('Location:pos_login.php');
}

