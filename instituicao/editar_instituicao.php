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
        $sql_ins = "INSERT INTO INSTITUICAO VALUES (\"".$_REQUEST["sigla"]."\",\"".$_REQUEST["nome"]."\",\"".$_REQUEST["cidade"]."\",\"".$_REQUEST["uf"]."\",\"".$_REQUEST["pais"]."\");";
        echo $sql_ins;
        $con->query($sql_ins);
    } else {
        $sql_update = "UPDATE INSTITUICAO SET Nome=\"".$_REQUEST["nome"]."\",`Cidade`=\"".$_REQUEST["cidade"]."\",`UF`=\"".$_REQUEST["uf"]."\",`Pais`=\"".$_REQUEST["pais"]."\" WHERE sigla=\"".$_REQUEST["sigla"]."\";";
        echo $sql_update;
        $con->query($sql_update);
    }
    $con->close();
    //header("location: ./instituicoes_tela.php");
?>
