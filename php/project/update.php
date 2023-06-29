<?php
    session_start();

    include_once("../conn.php");

    $id = $_SESSION["select-project-id"];

    $sqlSelect = $conn->prepare("SELECT * FROM projeto WHERE id = $id");
    $sqlSelect->execute();
    $fetch = $sqlSelect->fetchAll();
    foreach($fetch as $item){
        $nome = $item["nome"];
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
                <h1>Cadastro de Projeto</h1>
                <hr>
                <div>
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                </div>
                <div>
                    <label for="name"><strong>Nome do projeto</strong></label>
                    <input type="text" id="name" name="name" placeholder="Digite o nome do projeto" value="<?php echo $nome;?>">
                </div>
                <div>
                    <label for="category"><strong>Categoria</strong></label>
                    <select name="category" id="category">
                        <option value="<?php echo $categoria;?>" selected><?php echo $categoria . "*";?></option>
                        <option value="Jogo">Jogo</option>
                        <option value="Livro">Livro</option>
                        <option value="Música">Música</option>
                        <option value="Filme">Filme</option>
                    </select>
                </div>
                <hr>
                <div id="form-btn">
                    <input type="submit" class="btn" value="Voltar" name="return">
                    <input type="submit" id="submit-btn" class="btn" value="Atualizar" name="update-project">
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