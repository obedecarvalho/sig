<!DOCTYPE html>
<html>

<head>
	<title>Área</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class="secundaria">
                <h2>Área</h2>
        
        <form action="./editar_area.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                $codigo = $_REQUEST["id"];
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                
                if ($codigo == -1){
                    echo "Nome <input type=\"text\" name=\"nome\"><br>";
                    echo "ID <input type=\"text\" name=\"id\"><br>";
                    echo "<input type=\"hidden\" value=\"0\" name=\"editar\">";                 
                    
                } else {
                    $sql_query = "SELECT nome, id FROM AREA WHERE id=\"".$codigo."\";";
                    $res = $con->query($sql_query);
                    if ($res->num_rows != 0){
                            $cat = $res->fetch_assoc();
                            echo "Nome <input type=\"text\" name=\"nome\" value=\"".$cat["nome"]."\" ><br>";
                            echo "<input type=\"hidden\" name=\"id\" value=\"".$cat["id"]."\"><br>";
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
