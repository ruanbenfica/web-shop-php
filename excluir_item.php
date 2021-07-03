<?php
session_start();

if(isset($_POST['excluir'])){
    
    $id=$_POST['id_produto'];
    $servername = "localhost";
    $database = "ruangabriel";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "DELETE FROM itens WHERE email_dono='$email_logado' && situacao='Emprestado' && id_produto='$id'";
    $result = mysqli_query($conn, $verificar);
    header("Location:pos_login.php");
    
}
    ?>