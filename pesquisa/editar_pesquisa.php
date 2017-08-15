<?php
    include("../info_bd.php");
    include("../session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    if ($editar == 0){
        $sql_ins = "INSERT INTO PESQUISA VALUES (".$_REQUEST["professor"].",".$_REQUEST["area"].",\"".$_REQUEST["linha"]."\")";
        echo $sql_ins;
        $con->query($sql_ins);
    }
    $con->close();
    header("location: ./pesquisa_tela.php");
?>
