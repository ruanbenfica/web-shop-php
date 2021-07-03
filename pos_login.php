<?php
session_start();
include_once("funcoes.php");
$id = pegar_id();
$produtos = pegar_produtos();
$devolvidos = produtos_devolvidos();

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="css/painel.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmprestaTudo.com</title>
</head>

<body>
    <header>
        <div class="conteiner">
            <div class="header-content">
                <a>
                    <img src="imagens/logo.png" id="logo">
                </a>

                <div class="right-side">
                    <span style="font-size: 18px;" class="nome_usuario">
                        <?php

                        if (isset($_SESSION['nome_logado'])) {

                            echo implode($_SESSION['nome_logado']);
                        }
                        ?>

                    </span>
                    <nav>
                        <ul>
                            <li>
                                <a href="dados_usuario.php">Editar perfil </a>
                            </li>
                            <li>
                                <a href="login.php"> Sair</a>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>


    </header>

    <div class="conteiner">

        <div class="adicionar">

            <h2>Cadastro de itens</h2>

            <form action="cadastrar_item.php" method="GET">
                <div class="inputs-box">
                    <div class="form-group">
                        <label class="label" for="">Nome do produto:</label>
                        <input name="nome_produto" type="text" maxlength="60" required="required">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Segmento do produto:</label>
                        <input name="segmento" type="text" maxlength="60" required="required">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Data do empréstimo:</label>
                        <input type="date" required="required" name="data_emprestimo">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Data de devolução combinada:</label>
                        <input type="date" name="data_devolução">
                    </div>

                    <div class="form-group">
                        <label class="label" for="">E-mail destinatário:</label>
                        <input type="text" required="required" name="email_destinatario">
                    </div>

                    <div class="submit-button-container">
                        <input class="submit-button" type="submit" value="Cadastrar">
                    </div>
                </div>
            </form>
            
        </div>
        <h1>Itens Emprestados</h1>
        <table>
            <tr>

                <th>ID do item</th>
                <th>Nome do produto</th>
                <th>Segmento</th>
                <th>Data do empréstimo</th>
                <th>Data de devolução combinada</th>
                <th>Contato do destinatário</th>
                <th>Situação</th>

            </tr>
            <?php
            foreach ($produtos as $itens) {

                echo "<tr>";
                echo "<td>" . $itens['id_produto'] . "</td>";
                echo "<td>" . $itens['nome_produto'] . "</td>";
                echo "<td>" . $itens['segmento'] . "</td>";
                echo "<td>" . $itens['data_emprestimo'] . "</td>";
                echo "<td>" . $itens['data_devolucao'] . "</td>";
                echo "<td>" . $itens['email_destinatario'] . "</td>";
                echo "<td>" . $itens['situacao'] . "</td>";
            }
            ?>
        </table><br>
        
            <form method ="POST" action="excluir_item.php">

                <label style="font-weight: bold; font-size:16px;" for="">Excluir Item <BR>ID:</label>
                <select name="id_produto" id="">
                    <?php
                    // ciclo para percorrer os elementos de um array
                    foreach ($id as $ids => $id_produto) {
                        echo '<option value="' . $id_produto['id_produto'] . '">' . $id_produto['id_produto'] . ' </option>';
                    }
                    ?>

                </select>
                <input type="submit" value="Excluir" name="excluir"><br><br>



            </form>
        <h1>Itens Devolvidos</h1>

        <form method="POST" action="itens_devolvidos.php">
            <label style="font-weight: bold; font-size:16px;" for="">Id do item a ser devolvido:</label>
            <select name="numero-id" id="">
                <?php
                // ciclo para percorrer os elementos de um array
                foreach ($id as $ids => $id_produto) {
                    echo '<option value="' . $id_produto['id_produto'] . '">' . $id_produto['id_produto'] . ' </option>';
                }
                ?>

            </select><br><br>

            <label style="font-weight: bold; font-size:16px;" for="">Data da devolução:</label>
            <input type="date" name='data' required="required">
            <input type="submit" value="Pedir devolução" name="enviar"><br>



        </form><br>
        <table>
            <tr>

                <th>ID do item</th>
                <th>Nome do produto</th>
                <th>Segmento</th>
                <th>Data do empréstimo</th>
                <th>Data da devolução</th>
                <th>Contato do destinatário</th>
                <th>Situação</th>

            </tr>
            <?php
            foreach ($devolvidos as $itens) {

                echo "<tr>";
                echo "<td>" . $itens['id_produto'] . "</td>";
                echo "<td>" . $itens['nome_produto'] . "</td>";
                echo "<td>" . $itens['segmento'] . "</td>";
                echo "<td>" . $itens['data_emprestimo'] . "</td>";
                echo "<td>" . $itens['data_devolucao'] . "</td>";
                echo "<td>" . $itens['email_destinatario'] . "</td>";
                echo "<td>" . $itens['situacao'] . "</td>";
            }
            ?>







        </table>
    </div>
</body>

</html>