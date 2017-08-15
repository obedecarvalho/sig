<!DOCTYPE html>
<html>

<head>
	<title>Orientações</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
    <div class="principal">
        <center>
            <div class="secundaria" >
                <h2>Orientações</h2>
                <table border="1">
                    <thead>
                        <th>Tema</th>
                        <th>Tipo</th>
                        <th>Aluno</th>
                        <th>Professor</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                        <th>Cancelado</th>
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
                $sql_query = "select o.id, o.aluno, o.professor, o.tipo, o.tema, o.inicio, o.fim, o.cancelado, a.nome as aluno_nome, p.Nome as professor_nome from ORIENTACAO as o, ALUNO as a, PROFESSOR as p WHERE o.Aluno = a.Matricula and o.Professor = p.ID;";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"8\">Não há cursos</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$cat["tema"]."</td>";
                        echo "<td>".$cat["tipo"]."</td>";
                        echo "<td>".$cat["aluno_nome"]."</td>";
                        echo "<td>".$cat["professor_nome"]."</td>";
                        echo "<td>".$cat["inicio"]."</td>";
                        echo "<td>".$cat["fim"]."</td>";
                        echo "<td>".$cat["cancelado"]."</td>";
                        echo "<td><a href=\"editar_orientacao_tela.php?id=".$cat["id"]."\">Editar</a></td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_orientacao_tela.php?id=-1\">Add Orientação</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Início</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
