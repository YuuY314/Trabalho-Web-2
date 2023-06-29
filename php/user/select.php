<?php
    session_start();

    include_once("../conn.php");

    $id = $_SESSION["select-user-id"];

    $sqlSelect = $conn->prepare("SELECT * FROM usuario WHERE id = $id");
    $sqlSelect->execute();
    $fetch = $sqlSelect->fetchAll();
    foreach($fetch as $item){
        $nome_usuario = $item["nome_usuario"];
        $email = $item["email"];
        $senha = $item["senha"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Maker Studio</title>
    <link rel="stylesheet" href="../../css/styles.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="img/icon.png">
</head>
<body>
    <header>
        <a href="../../index.php"><img src="../../img/icon.png" alt="Story Maker Studio" width=90 height=90></a>
        <nav>
            <ul>
                <li><a href="../../index.php"><strong>Home</strong></a></li>
                <li><a href="../../list.php"><strong>Listagem</strong></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form action="../register.php" method="POST">
                <h1>Informações do Usuário</h1>
                <hr>
                <div>
                    <label for="id_user"><strong>ID</strong></label>
                    <?php echo $id;?>
                </div>
                <div>
                    <label for="name"><strong>Nome de usuário</strong></label>
                    <?php echo $nome_usuario;?>
                </div>
                <div>
                    <label for="email"><strong>E-mail</strong></label>
                    <?php echo $email;?>
                </div>
                <div>
                    <label for="password"><strong>Senha</strong></label>
                    <?php echo $senha;?>
                </div>
                <hr>
                <label for="projects"><strong>Projetos Inscritos</strong></label>
                <div class="center">
                    <?php
                        $sqlSelect = $conn->prepare("SELECT * FROM usuario_projeto WHERE id_usuario = $id");
                        $sqlSelect->execute();
                        $fetch = $sqlSelect->fetchAll();
                        foreach($fetch as $item){
                            $id_projeto[] = $item["id_projeto"];
                            $max_id = $item["id_projeto"];
                        }

                        error_reporting(E_ERROR | E_PARSE);

                        if(is_null($id_projeto)){
                            echo "Nenhuma inscrição";
                        } else {
                            for($i = 0; $i < count($id_projeto); $i++){
                                $sqlSelectProject = $conn->prepare("SELECT * FROM usuario_projeto, projeto WHERE usuario_projeto.id = $id AND projeto.id = $id_projeto[$i]");
                                $sqlSelectProject->execute();
                                $fetch = $sqlSelectProject->fetchAll();
                                foreach($fetch as $item){
                                    $data_inscricao = $item["data_inscricao"];
                                    $nome_projeto = $item["nome"];
                                    $categoria = $item["categoria"];            
                                    echo "<p>$id_projeto[$i] - $nome_projeto - $categoria - $data_inscricao</p>";                
                                }
                            }
                        }
                    ?>
                </div>
                <hr>
                <div id="form-btn">
                    <input type="submit" id="submit-btn" class="btn" value="Voltar" name="return">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy Story Maker Studio</p>
        <p>Desenvolvido por <a href="https://github.com/YuuY314" target="_blank" id="github-link">Rafael Yu</a></p>
    </footer>
</body>
</html>