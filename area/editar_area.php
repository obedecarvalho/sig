<?php
    include("../info_bd.php");
    include("../session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $editar = $_REQUEST["editar"];
    //tratar campos vazios
    if ($editar == 0){
        $sql_ins = "INSERT INTO AREA VALUES (".$_REQUEST["id"].",\"".$_REQUEST["nome"]."\");";
        echo $sql_ins;
        $con->query($sql_ins);
    } else {
        $sql_update = "UPDATE AREA SET nome=\"".$_REQUEST["nome"]."\" WHERE id=".$_REQUEST["id"]."";
        echo $sql_update;
        $con->query($sql_update);
    }
    $con->close();
    header("location: ./instituicoes_tela.php");
?>
