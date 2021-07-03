<?php
session_start();
?>


<!DOCTYPE html>

<html lang="pt-br">

<head>
    <link href="css/estilo_login.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

</head>

<body>
    <div class="login_teste">
        <h1 class="h1">Cadastrar-se</h1>
        



        <form action="validar.php" method="post">


            <label for="">Nome completo</label><br>
            <input name="nome" required="required" type="text" maxlength="60" placeholder="Digite seu nome completo" />
            <p></p>
            <p class="erro-validacao">
                <?php

                if (isset($_SESSION['loginError'])) {

                    echo $_SESSION['loginError'];
                    unset($_SESSION['loginError']);
                }


                ?>

            </p>



            <label for="">E-mail</label><br>
            <input name="email" required="required" type="text" maxlength="60" placeholder="exemplo@hotmail.com" />
            <p></p>
            <p class="erro-validacao">
                <?php

                if (isset($_SESSION['emailError'])) {

                    echo $_SESSION['emailError'];
                    unset($_SESSION['emailError']);
                }


                ?>

            </p>
            <p class="erro-validacao">
                <?php

                if (isset($_SESSION['repeatError'])) {

                    echo $_SESSION['repeatError'];
                    unset($_SESSION['repeatError']);
                }


                ?>

            </p>


            <label for="">Senha</label><br>
            <input name="senha" required="required" type="password" maxlength="60" placeholder="Digite sua senha" />
            <p></p>


            <input type="submit" value="Cadastrar" name="enviar">
            <p></p>

            <p class="cadastrar">
                Já possuí uma conta?
                <a href="login.php">Entrar</a>
            </p>





        </form>











    </div>








</body>

</html>