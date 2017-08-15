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
        $sql_ins = "INSERT INTO ALUNO VALUES (".$_REQUEST["matricula"].",\"".$_REQUEST["nome"]."\",\"".$_REQUEST["cidade"]."\",\"".$_REQUEST["uf"]."\",".$_REQUEST["cra"].",".$_REQUEST["codigo"].")";
        $con->query($sql_ins);
    } else {
        $sql_update = "UPDATE ALUNO SET Nome=\"".$_REQUEST["nome"]."\",Cidade=\"".$_REQUEST["cidade"]."\",UF=\"".$_REQUEST["uf"]."\",CRA=".$_REQUEST["cra"].",Curso=".$_REQUEST["codigo"]." WHERE Matricula=".$_REQUEST["matricula"].";";
        $con->query($sql_update);
    }
    $con->close();
    header("location: ./alunos_tela.php");
?>
