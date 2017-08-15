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
        $sql_ins = "INSERT INTO PROFESSOR VALUES (".$_REQUEST["id"].",\"".$_REQUEST["nome"]."\",\"".$_REQUEST["instituicao"]."\",\"".$_REQUEST["email"]."\",\"".$_REQUEST["pagina"]."\" , ".$_REQUEST["lattes"].")";
        echo $sql_ins;
        $con->query($sql_ins);
    } else {
        $sql_update = "UPDATE `PROFESSOR` SET `Nome`=\"".$_REQUEST["nome"]."\",`Instituicao`=\"".$_REQUEST["instituicao"]."\",`Email`=\"".$_REQUEST["email"]."\",`Pagina`=\"".$_REQUEST["pagina"]."\",`Lattes`=".$_REQUEST["lattes"]." WHERE id=".$_REQUEST["id"]."";
        echo $sql_update;
        $con->query($sql_update);
    }
    $con->close();
    header("location: ./professores_tela.php");
?>
