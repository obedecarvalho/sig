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
        $sql_ins = "INSERT INTO CURSO VALUES (".$_REQUEST["codigo"].",\"".$_REQUEST["nome"]."\",\"".$_REQUEST["instituicao"]."\",\"".$_REQUEST["forma"]."\",\"".$_REQUEST["sigla"]."\")";
        echo $sql_ins;
        $con->query($sql_ins);
    } else {
        $sql_update = "UPDATE CURSO SET Nome=\"".$_REQUEST["nome"]."\",instituicao=\"".$_REQUEST["instituicao"]."\",forma=\"".$_REQUEST["forma"]."\",sigla=\"".$_REQUEST["sigla"]."\" WHERE codigo=".$_REQUEST["codigo"].";";
        echo $sql_update;
        $con->query($sql_update);
    }
    $con->close();
    //header("location: ./cursos_tela.php");
?>
