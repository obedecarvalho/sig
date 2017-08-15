<!DOCTYPE html>
<html>

<head>
	<title>Categorias</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <center>
                <div name="" class="secundaria">
                    <h2> Categorias</h2>
                        <?php
                            include("./session.php");
                            include("./info_bd.php");
                            $con = new mysqli($host, $login, $senha, $bd); 
                            if (!$con) {
                                echo "Error: " . mysqli_connect_error();
                                exit();
                            }
                            $sql_query = "SELECT id_cat, nome_cat FROM categoria;";
                            $res = $con->query($sql_query);
                            if ($res->num_rows == 0){
                                echo "Não há categorias<br>\n";
                            } else {
                                while ($cat = $res->fetch_assoc()){
                                    echo "<a href=\"./categoria_tela.php?id_cat=".$cat["id_cat"]."\">".$cat["nome_cat"]."</a><br>\n";
                                }
                            }
                            $con->close();
                        ?>
                    </div>
                    <div name="" class="secundaria">
                        <form action="./add_categoria.php" method="post">
                            <input type="text" name="nome_cat">
                            <input type="submit" value="Adicionar categoria">
                        </form>
                    </div>
                    <a href="./sair.php">Sair</a>
            </center>
        </div>
    </center>
</body>

</html>
