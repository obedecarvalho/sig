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
            <div class="secundaria">
                <h2>Pesquisa</h2>
        
        <form action="./editar_pesquisa.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                

                echo "Linha<input type=\"text\" name=\"linha\"><br>";
                echo "Professor<input type=\"text\" name=\"professor\"><br>";
                echo "Area<input type=\"text\" name=\"area\"><br>";
                $con->close();
            ?>
            <input type="submit">
        </form>
            </div>
                <a href="../categorias_tela.php">Voltar</a><br>
                <a href="../sair.php">Sair</a>
        </div>
    </center>
</body>

</html>
