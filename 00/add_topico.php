<?php
    include("./info_bd.php");
    include("./session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $sql_ins = "INSERT INTO post VALUES (null,".$_SESSION["id_usr"].",".$_POST["id_cat"].", CURRENT_DATE,'".$_POST["post_tit"]."','".$_POST["post_text"]."');";
    $con->query($sql_ins);
    $sql_query = "SELECT MAX(id_post) as id_post FROM post;";
    $res = $con->query($sql_query);
    $post = $res->fetch_assoc();
    $con->close();
    header("location: ./post_tela.php?id_post=".$post["id_post"]);
?>
