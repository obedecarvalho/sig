<?php
    include("../info_bd.php");
    include("../session.php");
    $con = new mysqli($host, $login, $senha, $bd); 
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
    $editar = $_REQUEST["editar"];
    if ($editar == 0){
        if ($_REQUEST["cancelado"] == S){
            $cancelado = "\"S\"";
        } else {
            $cancelado = "NULL";
        }
        $sql_ins = "INSERT INTO ORIENTACAO VALUES (".$_REQUEST["id"].",".$_REQUEST["aluno"].",".$_REQUEST["professor"].",\"".$_REQUEST["tipo"]."\",\"".$_REQUEST["tema"]."\",".$_REQUEST["inicio"].",".$_REQUEST["fim"].",".$cancelado.")";
        echo $sql_ins;
        $con->query($sql_ins);
    } else {
        if ($_REQUEST["cancelado"] == S){
            $cancelado = "\"S\"";
        } else {
            $cancelado = "NULL";
        }
        $sql_update = "update ORIENTACAO SET aluno=".$_REQUEST["aluno"].", professor=".$_REQUEST["professor"].", tipo=\"".$_REQUEST["tipo"]."\", tema=\"".$_REQUEST["tema"]."\", inicio=".$_REQUEST["inicio"].", fim=".$_REQUEST["fim"].", cancelado=".$cancelado." WHERE ID =".$_REQUEST["id"].";";
        echo $sql_update;
        $con->query($sql_update);
    }
    $con->close();
    //header("location: ./orientacoes_tela.php");
?>
