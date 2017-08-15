<!DOCTYPE html>
<html>

<head>
	<title>Add topico</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class = "secundaria">
                <h2>Novo tópico</h2>
        
        <form action="./add_topico.php" method="post">
            <?php
                include("./session.php");
                echo "<input type=\"hidden\" name=\"id_cat\" value=\"".$_GET["id_cat"]."\"><br>\n";
            ?>
            Titulo: <input type="text" name="post_tit"><br>
            Post: <input type="text" name="post_text"><br>
            <input type="submit" value="Add topico">
        </form>
            </div>
            <a href="./categorias_tela.php">Voltar</a><br>
    <a href="./sair.php">Sair</a>
        </div>
    </center>
</body>

</html>
