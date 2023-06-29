<?php
    session_start();

    include_once("../conn.php");

    $id = $_SESSION["select-up-id"];

    $sqlSelect = $conn->prepare("SELECT * FROM usuario_projeto WHERE id = $id");
    $sqlSelect->execute();
    $fetch = $sqlSelect->fetchAll();
    foreach($fetch as $item){
        $data_inscricao = $item["data_inscricao"];
        $id_usuario = $item["id_usuario"];
        $id_projeto = $item["id_projeto"];
    }

    $sqlSelectUser = $conn->prepare("SELECT * FROM usuario WHERE id = $id_usuario");
    $sqlSelectUser->execute();
    $fetch = $sqlSelectUser->fetchAll();
    foreach($fetch as $item){
        $nome_usuario = $item["nome_usuario"];
        $email = $item["email"];
    }

    $sqlSelectProject = $conn->prepare("SELECT * FROM projeto WHERE id = $id_projeto");
    $sqlSelectProject->execute();
    $fetch = $sqlSelectProject->fetchAll();
    foreach($fetch as $item){
        $nome_projeto = $item["nome"];
        $categoria = $item["categoria"];
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
                <h1>Informações da Inscrição</h1>
                <hr>
                <div>
                    <label for="id_up"><strong>ID</strong></label>
                    <?php echo $id;?>
                </div>
                <div>
                    <label for="data-inscricao"><strong>Data de inscrição</strong></label>
                    <?php echo $data_inscricao;?>
                </div>
                <div>
                    <label for="name-user"><strong>Nome do usuário</strong></label>
                    <?php echo $nome_usuario;?>
                </div>
                <div>
                    <label for="email"><strong>E-mail do usuário</strong></label>
                    <?php echo $email;?>
                </div>
                <div>
                    <label for="name-project"><strong>Nome do projeto</strong></label>
                    <?php echo $nome_projeto;?>
                </div>
                <div>
                    <label for="category"><strong>Categoria do projeto</strong></label>
                    <?php echo $categoria;?>
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