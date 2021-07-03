<?php

session_start();
include_once('conectar.php');



if ((isset($_POST['email_login'])) && (isset($_POST['senha_login']))) {


    $email = mysqli_real_escape_string($conn, $_POST['email_login']);

    $senha = mysqli_real_escape_string($conn, $_POST['senha_login']);

    $verificar = "SELECT * FROM cadastro WHERE email='$email' && senha='$senha' LIMIT 1";
    $result = mysqli_query($conn, $verificar);
    $resultado = mysqli_fetch_assoc($result);

    if (empty($resultado)) {

        $_SESSION['logError'] = "E-mail ou Senha inválido";
        header("Location:login.php");
    } elseif (isset($resultado)) {


        $verificar = "SELECT nome FROM cadastro WHERE email='$email'";
        $result1 = mysqli_query($conn, $verificar);
        $row = mysqli_fetch_row($result1);

        $_SESSION['email_logado'] = $email;
        $_SESSION['nome_logado'] = $row;
        header("Location: pos_login.php");
    } else {
        $_SESSION['logError'] = "E-mail ou Senha inválido";
        header("Location:login.php");
    }
} else {
    $_SESSION['logError'] = "E-mail ou Senha inválido";
    header("Location:login.php");
}
