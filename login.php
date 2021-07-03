<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="css/estilo_login.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>


    <div class="login_teste">
        <h1 class="h1">Login</h1>

        <form action="logar.php" method="POST">
            <label for="email">E-mail: </label> <br>
            <input name="email_login" required="required" type="text" maxlength="60" placeholder="exemplo@hotmail.com" />
            <p>

            </p>






            <label for="senha">Senha: </label><br>
            <input name="senha_login" required="required" type="password" maxlength="60" placeholder="Digite sua senha" />
            <p>

            </p>

            <input type="submit" value="Logar" />
            <p class="cadastrar">
                Não possuí uma conta?
                <a href="cadastro.php">Cadastre-se</a>
            </p>
            <p class="erro-validacao">
                <?php

                if (isset($_SESSION['logError'])) {

                    echo $_SESSION['logError'];
                    unset($_SESSION['logError']);
                }


                ?>

            </p>


        </form>


    </div>

</body>

</html>