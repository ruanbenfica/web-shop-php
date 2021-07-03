<?php
session_start();
include_once("conectar.php");
$email_logado = $_SESSION['email_logado'];
$verificar = "SELECT nome,email FROM cadastro WHERE email='$email_logado'";
$result = mysqli_query($conn, $verificar);
$row = mysqli_fetch_row($result);

$nome = $row[0];
$email = $row[1];




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="css/editar.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus dados</title>
</head>

<body>

    <header>
        <h1>Meus dados</h1><br>
    </header>
    <div class="container">
        <div class="meus-dados" <form method="POST" action="dados_usuario.php">
            <label for="" style="font-weight: bold; font-size:20px;">Nome Usuário:</label><br>
            <div class="dados-usuario">
                <?php
                echo $nome;
                ?>
                <p></p>
            </div>

            <label for="" style="font-weight: bold; font-size:20px">E-mail usuário </label><br>
            <div class="dados-usuario">
                <?php

                echo $email;

                ?>
            </div>

            </form>
        </div>
        <div class="alterar-dados">
            <div class="dados">
                <h1>Alterar Dados</h1>

                <form method="POST" action="alterar_dados.php">

                    <label for="">Alterar Nome</label><br>
                    <input name="alterar_nome" type="text"><br>
                    <div class="erros">
                        <?php
                        if (isset($_SESSION['nomeInvalido'])) {
                            echo $_SESSION['nomeInvalido'];
                            unset($_SESSION['nomeInvalido']);
                        }

                        ?>
                    </div>

                    <label for="">Alterar E-mail</label><br>
                    <input name="alterar_email" type="text"><br>
                    <div class="erros">
                        <?php
                        if (isset($_SESSION['alterar-email'])) {
                            echo $_SESSION['alterar-email'];
                            unset($_SESSION['alterar-email']);
                        }

                        ?>
                        <?php
                        if (isset($_SESSION['emailCadError'])) {
                            echo $_SESSION['emailCadError'];
                            unset($_SESSION['emailCadError']);
                        }

                        ?>
                    </div>

                    <label for="">Alterar Senha</label><br>
                    <input name="alterar_senha" type="password"><br><br>
                    <div class="alterar">
                        <input name="enviar" type="submit" value="Alterar">
                    </div>

            </div>

            </form>

        </div>
        <div class="voltar">
            <a style="text-decoration:none;color:black;" href="pos_login.php">Voltar</a>
        </div>
    </div>






























</body>

</html>