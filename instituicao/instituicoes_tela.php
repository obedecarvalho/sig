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
                <h2>Instituição</h2>
                <table border="1">
                    <thead>
                        <th>
                            Sigla
                        </th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>País</th>
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
                $sql_query = "SELECT sigla, nome, cidade, uf, pais FROM INSTITUICAO;";
                $res = $con->query($sql_query);
                if ($res->num_rows == 0){
                    echo "<tr><td colspan=\"5\">Não há instituição</td></tr>";
                } else {
                    while ($cat = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$cat["sigla"]."</td>";
                        echo "<td>".$cat["nome"]."</td>";
                        echo "<td>".$cat["cidade"]."</td>";
                        echo "<td>".$cat["uf"]."</td>";
                        echo "<td>".$cat["pais"]."</td>";
                        echo "<td><a href=\"editar_instituicao_tela.php?sigla=".$cat["codigo"]."\">Editar</a></td>";
                        echo "</tr>";
                    }
                }
                $con->close();
                
            ?>  
            </table>      
            <?php
                echo "<br>\n<a href=\"./editar_instituicao_tela.php?sigla=-1\">Add Instituição</a>";
                echo "<br>\n<a href=\"../categorias_tela.php\">Voltar</a>";
            ?>
            </div>
        </center>
    </div>
    </center>
</body>

</html>
