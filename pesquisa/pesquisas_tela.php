<!DOCTYPE html>
<html>

<head>
	<title>Pesquisa</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
    <div class="principal">
        <center>
            <div class="secundaria" >
                <h2>Pesquisa</h2>
                <table border="1">
                    <thead>
                        <th>Linha</th>
                        <th>Professor</th>
                        <th>Área</th>
                    </thead>
                
            <?php
                include("../session.php");
                include("../info_bd.php");
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                $sql_query = "select pe.linha, pr.Nome as nome_professor, a.Nome as nome_area, pe.area, pe.professor from PESQUISA as pe, PROFESSOR as pr, AREA as a WHERE pe.Area = a.ID and pe.Professor = pr.ID;";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"4\">Não há pesquisa</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$cat["linha"]."</td>";
                        echo "<td>".$cat["nome_professor"]."</td>";
                        echo "<td>".$cat["nome_area"]."</td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_pesquisa_tela.php\">Add Pesquisa</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Voltar</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
