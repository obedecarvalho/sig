<?php
    include("./info_bd.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $nome = $_REQUEST["nome"];
    $sql_query = "SELECT id_usr FROM usr WHERE nome='".$nome."';";
    $res = $con->query($sql_query);
    if ($res->num_rows != 0){
        $con->close();
        header("location: ./login_tela.php?msg=2");
    }
    $sql_ins = "INSERT INTO usr VALUES (null,'".$nome."','".$_REQUEST["senha"]."');";
    $con->query($sql_ins);
    $res = $con->query($sql_query);
    $id_usr_t = $res->fetch_assoc();
    $id_usr = $id_usr_t["id_usr"];
    session_start();
    $_SESSION["id_usr"] = $id_usr;
    $con->close();
    header("location: ./categorias_tela.php");
?>
