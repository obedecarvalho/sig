<!DOCTYPE html>
<html>

<head>
	<title>Instituições</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
    <div class="principal">
        <center>
            <div class="secundaria" >
                <h2>Professor</h2>
                <table border="1">
                    <thead>
                        <th>Nome</th>
                        <th>Instituição</th>
                        <th>Email</th>
                        <th>Página</th>
                        <th>Lattes</th>
                    </thead>
                
            <?php
                include("../session.php");
                include("../info_bd.php");
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                $sql_query = "SELECT id, nome, instituicao, email, pagina, lattes FROM PROFESSOR;";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"6\">Não há instituição</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$cat["nome"]."</td>";
                        echo "<td>".$cat["instituicao"]."</td>";
                        echo "<td>".$cat["email"]."</td>";
                        echo "<td>".$cat["pagina"]."</td>";
                        echo "<td>".$cat["lattes"]."</td>";
                        echo "<td><a href=\"editar_professor_tela.php?id=".$cat["id"]."\">Editar</a></td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_professor_tela.php?id=-1\">Add Professor</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Voltar</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
