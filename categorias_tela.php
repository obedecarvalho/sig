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
                    <h2>SIG</h2>
                        <?php
                            include("./session.php");
                        ?>
                        <a href="./aluno/alunos_tela.php">Alunos</a>
                        <a href="./area/areas_tela.php">Areas</a>
                        <a href="./curso/cursos_tela.php">Cursos</a>
                        <a href="./instituicao/instituicoes_tela.php">Instituições</a>
                        <a href="./orientacao/orientacoes_tela.php">Orientações</a>
                        <a href="./pesquisa/pesquisas_tela.php">Pesquisas</a>
                        <a href="./professor/professores_tela.php">Professores</a>
                    </div>
                    <a href="./sair.php">Sair</a>
            </center>
        </div>
    </center>
</body>

</html>
