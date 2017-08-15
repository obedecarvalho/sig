<?php
    include("./info_bd.php");
    include("./session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $sql_ins = "INSERT INTO reply VALUES (null,".$_SESSION["id_usr"].",".$_POST["id_post"].", CURRENT_DATE,'".$_POST["reply"]."');";
    $con->query($sql_ins);
    $con->close();
    header("location: ./post_tela.php?id_post=".$_POST["id_post"]);
?>
