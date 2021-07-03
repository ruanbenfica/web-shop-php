<?php
session_start();




if(isset($_POST['enviar'])){
    $id=$_POST['numero-id'];
    $data = $_POST['data'];
    $servername = "localhost";
    $database = "ruangabriel";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    $email_logado = $_SESSION['email_logado'];
    $verificar = "UPDATE itens SET situacao ='Devolvido', data_devolucao='$data' WHERE email_dono='$email_logado' && id_produto='$id' ";
    $result = mysqli_query($conn, $verificar);
    header("location:pos_login.php");


}


 ?>