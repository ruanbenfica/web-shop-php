<?php

include_once("conectar.php");
session_start();


do {
    if (isset($_POST['enviar'])) {


        if (!empty($_POST['alterar_nome'])) {
            $nome = $_POST['alterar_nome'];
            if (is_numeric($nome) or !preg_match('/^[a-zA-Z0-9]+/', $nome)) {

                $_SESSION['nomeInvalido'] = '• Nome inválido';
                header("Location:dados_usuario.php");
                break;
            } else {


                $email_logado = $_SESSION['email_logado'];

                $verificar = "UPDATE cadastro set nome ='$nome'  WHERE email='$email_logado'";
                $result = mysqli_query($conn, $verificar);
                echo "entrou alterar nome";
            }
        }

        if (!empty($_POST['alterar_email'])) {


            if (!empty($_POST['alterar_email'])) {
                $email = $_POST['alterar_email'];
                $verificar = "SELECT * FROM cadastro WHERE email='$email' ";
                $result = mysqli_query($conn, $verificar);
                $resultado = mysqli_fetch_assoc($result);

                if (isset($resultado)) {
                    $_SESSION['emailCadError'] = '• E-mail já cadastrado';
                    header("Location:dados_usuario.php");
                    break;
                }
            }


            if (!filter_var($_POST['alterar_email'], FILTER_VALIDATE_EMAIL)) {

                $_SESSION['alterar-email'] = '• E-mail inválido';
                header("Location:dados_usuario.php");
                break;
            } else {
                $email_logado = $_SESSION['email_logado'];
                $email = $_POST['alterar_email'];
                $verificar = "UPDATE cadastro set email ='$email'  WHERE email='$email_logado'";
                $result = mysqli_query($conn, $verificar);

                $verificar2 = "UPDATE itens set email_dono ='$email'  WHERE email_dono='$email_logado'";
                $result1 = mysqli_query($conn, $verificar2);


                echo "entrou no email";
            }
        }


        if (!empty($_POST['alterar_senha'])) {
            if(!empty($_POST['alterar_email'])){
            $email_logado = $_POST['alterar_email'];
            }else{
            $email_logado= $_SESSION['email_logado'];
            }
            $senha = $_POST['alterar_senha'];
            $verificar = "UPDATE cadastro set senha ='$senha'  WHERE email='$email_logado'";
            $result = mysqli_query($conn, $verificar);

            echo "entrou na senha";
        }
        header("location:login.php");
    }
} while (0);
