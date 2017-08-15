<?php
    include("./info_bd.php");
    include("./session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $sql_ins = "INSERT INTO categoria VALUES (null,'".$_POST["nome_cat"]."');";
    $con->query($sql_ins);
    $sql_query = "SELECT MAX(id_cat) as id_cat FROM categoria;";
    $res = $con->query($sql_query);
    $cat = $res->fetch_assoc();
    $con->close();
    header("location: ./categoria_tela.php?id_cat=".$cat["id_cat"]);
?>
