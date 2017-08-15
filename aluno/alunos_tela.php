<!DOCTYPE html>
<html>

<head>
	<title>Categoria</title>
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
                        <th>Matrícula</th>
                        <th>Curso</th>
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
                //$sql_query = "SELECT p.post_titulo, u.nome, p.data_post, p.id_post FROM post as p, usr as u WHERE p.id_cat=".$_REQUEST["id_cat"]." and p.id_usr = u.id_usr;";
                $sql_query = "select a.nome, a.cra, a.matricula, a.cidade, a.uf, c.nome as curso from ALUNO as a, CURSO as c where a.curso = c.codigo";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"4\">Não há alunos</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        //$sql_nr = "SELECT COUNT(id_reply) as nro_reply FROM reply WHERE id_post=".$cat["id_post"].";";
                        //$nreply = $con->query($sql_nr);
                        echo "<tr>";
                        echo "<td>".$cat["nome"]."</td>";
                        echo "<td>".$cat["matricula"]."</td>";
                        echo "<td>".$cat["curso"]."</td>";
                        echo "<td><a href=\"editar_aluno_tela.php?matricula=".$cat["matricula"]."\">Editar</a></td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_aluno_tela.php?matricula=-1\">Add Aluno</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Voltar</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
