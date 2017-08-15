<?php
    include("./info_bd.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $sql_query = "SELECT id_usr FROM usr WHERE nome='".$_POST["nome"]."' AND senha='".$_POST["senha"]."';";
    $res = $con->query($sql_query);
    if ($res->num_rows == 0){
        header("location: ./login_tela.php?msg=1");
    }
    $id_usr_t = $res->fetch_assoc();
    session_start();
    $_SESSION["id_usr"] = $id_usr_t["id_usr"];;
    $con->close();
    header("location: ./categorias_tela.php");
?>
