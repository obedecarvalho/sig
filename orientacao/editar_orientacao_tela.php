<!DOCTYPE html>
<html>

<head>
	<title>Orientação</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <center>
        <div class="principal">
            <div class="secundaria">
                <h2>Orientação</h2>
        
        <form action="./editar_orientacao.php" method="post">
            <?php
                include("../session.php");
                include("../info_bd.php");
                $codigo = $_REQUEST["id"];
                
                $con = new mysqli($host, $login, $senha, $bd); 
                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }

                if ($codigo == -1){
                    echo "Tema <input type=\"text\" name=\"tema\"><br>";
                    //echo "Tipo <input type=\"text\" name=\"tipo\"><br>";
                    //'TCC','TCC-EST','EST','MONITORIA','IC','TCC-POS'
                    echo "Tipo <select name=tipo>";
                        echo "<option value=\"TCC\">TCC</option>";
                        echo "<option value=\"TCC-EST\">TCC-EST</option>";
                        echo "<option value=\"EST\">EST</option>";
                        echo "<option value=\"MONITORIA\">MONITORIA</option>";
                        echo "<option value=\"IC\">IC</option>";
                        echo "<option value=\"TCC-POS\">TCC-POS</option>";
                    echo "</select><br>";
                    
                    //
                    echo "Aluno <input type=\"text\" name=\"aluno\"><br>";
                    echo "Professor <input type=\"text\" name=\"professor\"><br>";
                    echo "Inicio <input type=\"text\" name=\"inicio\"><br>";
                    echo "Fim <input type=\"text\" name=\"fim\"><br>";
                    //echo "Cancelado <input type=\"text\" name=\"cancelado\"><br>";
                    //
                    echo "Cancelado <select name=cancelado>";
                        echo "<option value=\"S\">SIM</option>";
                        echo "<option value=\"NULL\"></option>";
                    echo "</select><br>";
                    //
                    echo "ID <input type=\"text\" name=\"id\"><br>";
                    echo "<input type=\"hidden\" value=\"0\" name=\"editar\">";
                    
                    
                } else {
                    $sql_query = "select o.id, o.aluno, o.professor, o.tipo, o.tema, o.inicio, o.fim, o.cancelado, a.nome as aluno_nome, p.Nome as professor_nome from ORIENTACAO as o, ALUNO as a, PROFESSOR as p WHERE o.Aluno = a.Matricula and o.Professor = p.ID and o.id=".$codigo.";";
                    $res = $con->query($sql_query);
                    if ($res->num_rows != 0){
                            $cat = $res->fetch_assoc();
                            echo "Tema <input type=\"text\" name=\"tema\" value=\"".$cat["tema"]."\"><br>";
                            //echo "Tipo <input type=\"text\" name=\"tipo\" value=\"".$cat["tipo"]."\"><br>";
                            echo "Tipo <select name=tipo>";
                                echo "<option value=\"TCC\">TCC</option>";
                                echo "<option value=\"TCC-EST\">TCC-EST</option>";
                                echo "<option value=\"EST\">EST</option>";
                                echo "<option value=\"MONITORIA\">MONITORIA</option>";
                                echo "<option value=\"IC\">IC</option>";
                                echo "<option value=\"TCC-POS\">TCC-POS</option>";
                            echo "</select><br>";
                            //
                            echo "Aluno <input type=\"text\" name=\"aluno\" value=\"".$cat["aluno"]."\"><br>";
                            echo "Professor <input type=\"text\" name=\"professor\" value=\"".$cat["professor"]."\"><br>";
                            echo "Inicio <input type=\"text\" name=\"inicio\" value=\"".$cat["inicio"]."\"><br>";
                            echo "Fim <input type=\"text\" name=\"fim\" value=\"".$cat["fim"]."\"><br>";
                            echo "Cancelado <input type=\"text\" name=\"cancelado\" value=\"".$cat["cancelado"]."\"><br>";
                            echo "<input type=\"hidden\" name=\"id\" value=\"".$cat["id"]."\"><br>";
                            echo "<input type=\"hidden\" value=\"1\" name=\"editar\">";
                    }
                }
                $con->close();
            ?>
            <input type="submit">
        </form>
            </div>
                <a href="../categorias_tela.php">Início</a><br>
                <a href="../sair.php">Sair</a>
        </div>
    </center>
</body>

</html>
