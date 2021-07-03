<?php

function pegar_id()
{

    $servername = "localhost";
    $database = "ruangabriel";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "SELECT id_produto FROM itens WHERE email_dono='$email_logado' && situacao='Emprestado'";
    $result = mysqli_query($conn, $verificar);
    $id = array();
    $contagem = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id[$contagem] = $row;
            $contagem++;
        }
    }

    return $id;
}
function pegar_produtos()
{

    $servername = "localhost";
    $database = "ruangabriel";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "SELECT id_produto,nome_produto,segmento,data_emprestimo,data_devolucao,email_destinatario,situacao FROM itens WHERE email_dono='$email_logado' && situacao='Emprestado'";
    $result = mysqli_query($conn, $verificar);
    $itens = array();
    $contagem = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itens[$contagem] = $row;
            $contagem++;
        }
    }

    return $itens;
}

function produtos_devolvidos()
{

    $servername = "localhost";
    $database = "ruangabriel";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "SELECT id_produto,nome_produto,segmento,data_emprestimo,data_devolucao,email_destinatario,situacao FROM itens WHERE email_dono='$email_logado' && situacao='Devolvido'";
    $result = mysqli_query($conn, $verificar);
    $devolvidos = array();
    $contagem = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $devolvidos[$contagem] = $row;
            $contagem++;
        }
    }

    return $devolvidos;
}
function excluir_item()
{
    $id=$_POST['id_produto'];
    $servername = "localhost";
    $database = "login";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "DELETE * FROM itens WHERE email_dono='$email_logado' && situacao='Emprestado' && id_produto='$id'";
    $result = mysqli_query($conn, $verificar);
    $id = array();
    $contagem = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id[$contagem] = $row;
            $contagem++;
        }
    }

    return $id;
}


