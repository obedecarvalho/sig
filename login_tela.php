<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
</head>

<body>
    <center>
        <div class="principal" ng-app="index" ng-controller="index_ctrl">
            <center>
                <h2>Seja bem vindo!</h2>
                <label style="color:red;">
                    <?php
                        session_start();
                        if(isset($_SESSION["id_usr"])){
                            header("location: ./categorias_tela.php");
                        }
                        if (isset($_GET["msg"])){
                            if ($_GET["msg"] == 1){
                                echo "<br>Usuario e senha não conferem!<br>";
                            } else if ($_GET["msg"] == 2){
                                echo "<br>Usuário já existe!<br>";
                            } else if ($_GET["msg"] == 3){
                                echo "<br>Deslogado com sucesso!<br>";
                            }  else if ($_GET["msg"] == 4){
                                echo "<br>É necessário logar-se!<br>";
                            }
                        }
                    ?>
                </label>
                <div id="login" class="secundaria">
                    Login:
                    <form method="post" action="./login.php">
                        Nome: <input name="nome" type="text" ><br>
                        Senha: <input type="password" name="senha"><br>
                        <input type="submit">
                    </form>
                </div>
                <div id="cadastrar" class="secundaria">
                    Cadastrar:
                    <form method="get" action="./cadastrar_usuario.php">
                        Nome: <input name="nome" type="text"><br>
                        Senha: <input type="password" name="senha"><br>
                        <br><input type="submit">
                    </form>
                </div>
            </center>
        </div>
    </center>
</body>

</html>
