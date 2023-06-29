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
                <h1>Atualização de Dados do Usuário</h1>
                <hr>
                <div>
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                </div>
                <div>
                    <label for="name"><strong>Nome de usuário</strong></label>
                    <input type="text" id="name" name="name" placeholder="Digite seu nome de usuário" value="<?php echo $nome_usuario;?>">
                </div>
                <div>
                    <label for="email"><strong>E-mail</strong></label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $email;?>">
                </div>
                <div>
                    <label for="password"><strong>Senha</strong></label>
                    <input type="text" id="password" name="password" placeholder="Digite sua senha" value="<?php echo $senha;?>">
                </div>
                <hr>
                <div id="form-btn">
                    <input type="submit" class="btn" value="Voltar" name="return">
                    <input type="submit" id="submit-btn" class="btn" value="Atualizar" name="update-user">
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