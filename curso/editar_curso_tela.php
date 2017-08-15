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
                <h2>Curso</h2>
        
        <form action="./editar_curso.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                $codigo = $_REQUEST["codigo"];
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }

                if ($codigo == -1){
                    echo "Nome <input type=\"text\" name=\"nome\"><br>";
                    echo "Sigla <input type=\"text\" name=\"sigla\"><br>";
                    echo "Forma <input type=\"text\" name=\"forma\"><br>";
                    echo "Instituição <input type=\"text\" name=\"instituicao\"><br>";
                    //falta instituicao?
                    echo "Código <input type=\"text\" name=\"codigo\"><br>";
                    echo "<input type=\"hidden\" value=\"0\" name=\"editar\">";
                    
                    
                } else {
                    $sql_query = "SELECT nome, instituicao, forma, sigla, codigo FROM CURSO WHERE codigo=\"".$codigo."\";";
                    $res = $con->query($sql_query);
                    if ($res->num_rows != 0){
                            $cat = $res->fetch_assoc();
                            echo "Nome <input type=\"text\" name=\"nome\" value=\"".$cat["nome"]."\"><br>";
                            echo "Sigla <input type=\"text\" name=\"sigla\" value=\"".$cat["sigla"]."\"><br>";
                            echo "Forma <input type=\"text\" name=\"forma\" value=\"".$cat["forma"]."\"><br>"; //'Presencial', 'EAD'
                            echo "Instituição <input type=\"text\" name=\"instituicao\" value=\"".$cat["instituicao"]."\"><br>";
                            //falta instituicao?
                            echo "<input type=\"hidden\" name=\"codigo\" value=\"".$cat["codigo"]."\"><br>";
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
