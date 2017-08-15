<!DOCTYPE html>
<html>

<head>
	<title>Post</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <center>
    <div class="principal">
        <div class="secundaria">
            <h2>Tópico</h2>
    <?php
        include("./session.php");
        include("./info_bd.php");
        $con = new mysqli($host, $login, $senha, $bd); 
        if (!$con) {
            echo "Error: " . mysqli_connect_error();
            exit();
        }
        $sql_query = "SELECT p.data_post, p.post_texto, p.post_titulo, u.nome, u.id_img FROM post as p, usr as u WHERE p.id_post=".$_REQUEST["id_post"]." and u.id_usr = p.id_usr;";
        $res = $con->query($sql_query);
        if ($res->num_rows == 0){
            echo "Post não existe<br>";
        } else {
            echo "<table border=\"1\">";
            $post = $res->fetch_assoc();
            echo "<tr><td colspan=\"2\">".$post["post_titulo"]."</td></tr>";
            echo "<tr><td>".$post["nome"]."</td><td>".$post["data_post"]."</td></tr>";
            echo "<tr><td><img height=\"42\" width=\"42\" src=".$post["id_img"].".png></td><td>".$post["post_texto"]."</td></tr>";
            $sql_query = "SELECT r.data_reply, r.reply, u.nome, u.id_img FROM reply as r, usr as u WHERE r.id_post=".$_REQUEST["id_post"]." and u.id_usr = r.id_usr;";
            $res = $con->query($sql_query);
            if ($res->num_rows == 0){
                echo "<tr><td colspan=\"2\">Não há respostas a este post!</td></tr><br>\n";
            } else {
                while ($resp = $res->fetch_assoc()){
                    echo "<tr><td>".$resp["nome"]."</td><td>".$resp["data_reply"]."</td></tr>";
                    echo "<tr><td><img height=\"42\" width=\"42\" src=".$resp["id_img"].".png></td><td>".$resp["reply"]."</td></tr>";
                }
            }
            echo "</table>";
            echo "<br>\n<a href=\"add_resposta_tela.php?id_post=".$_REQUEST["id_post"]."\">Responder</a><br>\n";
        }    
        $con->close();
    ?>
    </div>
    <a href="./categorias_tela.php">Voltar</a><br>
    <a href="./sair.php">Sair</a>
	</div>
    </center>
</body>

</html>
