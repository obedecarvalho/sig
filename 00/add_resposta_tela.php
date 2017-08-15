<!DOCTYPE html>
<html>

<head>
	<title>Add Resposta</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class="secundaria">
                <h2>Responder</h2>
        
        <form action="./add_resposta.php" method="post">
            <?php
                include("./session.php");
                echo "<input type=\"hidden\" name=\"id_post\" value=\"".$_GET["id_post"]."\"><br>\n";
            ?>
            Resposta: <input type="text" name="reply"><br>
            <input type="submit" value="Add Resposta">
        </form>
            </div>
                    <a href="./categorias_tela.php">Voltar</a><br>
    <a href="./sair.php">Sair</a>
        </div>
    </center>
</body>

</html>
