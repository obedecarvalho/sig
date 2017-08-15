<!DOCTYPE html>
<html>

<head>
	<title>Cursos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
    <div class="principal">
        <center>
            <div class="secundaria" >
                <h2>Listagem de tópicos</h2>
                <table border="1">
                    <thead>
                        <th>
                            Nome
                        </th>
                        <th>Sigla</th>
                        <th>Forma</th>
                        <th>Instituição</th>
                        <th>Editar</th>
                    </thead>
                
            <?php
                include("../session.php");
                include("../info_bd.php");
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                $sql_query = "SELECT nome, instituicao, forma, sigla, codigo FROM CURSO;";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"5\">Não há cursos</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$cat["nome"]."</td>";
                        echo "<td>".$cat["sigla"]."</td>";
                        echo "<td>".$cat["forma"]."</td>";
                        echo "<td>".$cat["instituicao"]."</td>";
                        echo "<td><a href=\"editar_curso_tela.php?codigo=".$cat["codigo"]."\">Editar</a></td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_curso_tela.php?codigo=-1\">Add Curso</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Voltar</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
