<!DOCTYPE html>
<html>

<head>
	<title>Curso</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class="secundaria">
                <h2>Instituição</h2>
        
        <form action="./editar_instituicao.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                $codigo = $_REQUEST["sigla"];
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                
                if ($codigo == -1){
                    echo "Nome <input type=\"text\" name=\"nome\"><br>";
                    echo "Sigla <input type=\"text\" name=\"sigla\"><br>";
                    echo "Cidade <input type=\"text\" name=\"cidade\"><br>";
                    echo "UF <input type=\"text\" name=\"uf\"><br>";
                    echo "País <input type=\"text\" name=\"pais\"><br>";   
                    echo "<input type=\"hidden\" value=\"0\" name=\"editar\">";                 
                    
                } else {
                    $sql_query = "SELECT sigla, nome, cidade, uf, pais FROM INSTITUICAO WHERE sigla=\"".$codigo."\";";
                    $res = $con->query($sql_query);
                    if ($res->num_rows != 0){
                            $cat = $res->fetch_assoc();
                            echo "Nome <input type=\"text\" name=\"nome\" value=\"".$cat["nome"]."\"><br>";
                            echo "<input type=\"hidden\" name=\"sigla\" value=\"".$cat["sigla"]."\">";
                            echo "Cidade <input type=\"text\" name=\"cidade\" value=\"".$cat["cidade"]."\"><br>";
                            echo "UF <input type=\"text\" name=\"uf\" value=\"".$cat["uf"]."\"><br>";
                            echo "País <input type=\"text\" name=\"pais\" value=\"".$cat["pais"]."\"><br>";                    
                            echo "<input type=\"hidden\" value=\"1\" name=\"editar\">";
                    }
                }
                $con->close();
            ?>
            <input type="submit">
        </form>
            </div>
                <a href="../categorias_tela.php">Voltar</a><br>
                <a href="../sair.php">Sair</a>
        </div>
    </center>
</body>

</html>
