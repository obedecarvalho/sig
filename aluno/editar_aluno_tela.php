<!DOCTYPE html>
<html>

<head>
	<title>Aluno</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class="secundaria">
                <h2>Aluno</h2>
        
        <form action="./editar_aluno.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                $matricula = $_REQUEST["matricula"];
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                
                if ($matricula == -1){
                    echo "Nome <input type=\"text\" name=\"nome\"><br>";
                    echo "CRA <input type=\"text\" name=\"cra\"><br>";
                    echo "Matrícula <input type=\"text\" name=\"matricula\"><br>";
                    echo "Cidade <input type=\"text\" name=\"cidade\"><br>";
                    echo "UF <input type=\"text\" name=\"uf\"><br>";
                    echo "Curso <input type=\"text\" name=\"codigo\"><br>";
                    //falta curso
                    echo "<input type=\"hidden\" value=\"0\" name=\"editar\">";
                    
                } else {
                    $sql_query = "select a.nome, a.cra, a.matricula, a.cidade, a.uf, c.nome as curso, c.codigo from ALUNO as a, CURSO as c where a.curso = c.codigo and a.matricula=".$matricula.";";
                    $res = $con->query($sql_query);
                    if ($res->num_rows != 0){
                            $cat = $res->fetch_assoc();
                            echo "Nome <input name=\"nome\" value=\"".$cat["nome"]."\"><br>";
                            echo "CRA <input name=\"cra\" value=\"".$cat["cra"]."\"><br>";
                            echo "<input type=\"hidden\" name=\"matricula\" value=\"".$cat["matricula"]."\">";
                            echo "Cidade <input name=\"cidade\" value=\"".$cat["cidade"]."\"><br>";
                            echo "UF <input name=\"uf\" value=\"".$cat["uf"]."\"><br>";
                            echo "Curso <input type=\"text\" name=\"codigo\" value=\"".$cat["codigo"]."\"><br>";
                            //falta curso
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
