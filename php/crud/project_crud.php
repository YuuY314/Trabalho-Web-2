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
        <a href="index.php"><img src="../../img/icon.png" alt="Story Maker Studio" width=90 height=90></a>
        <nav>
            <ul>
                <li><a href="index.php"><strong>Home</strong></a></li>
                <li><a href="list.php"><strong>Listagem</strong></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form action="php/register.php" method="POST">
                <h1>Cadastro</h1>
                <hr>
                <div>
                    <label for="name"><strong>Nome de usuário</strong></label>
                    <input type="text" id="name" name="name" placeholder="Digite seu nome de usuário" required>
                </div>
                <div>
                    <label for="email"><strong>E-mail</strong></label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu e-mail">
                </div>
                <div>
                    <label for="password"><strong>Senha</strong></label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha">
                </div>
                <!-- <div id="confirm-input">
                    <label for="confirm-password"><strong>Confirmar</strong></label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirme sua senha">
                </div> -->
                <hr>
                <label for="projects"><strong>Inscreva-se num dos projetos para receber notícias (Opcional)</strong></label>
                <div id="projects">
                    <div>
                        <input type="checkbox" id="game" name="game" value="1">
                        <label for="game"><strong>Jogo</strong></label>
                    </div>
                    <div>
                        <input type="checkbox" id="book" name="book" value="2">
                        <label for="book"><strong>Livro</strong></label>
                    </div>
                </div>
                <hr>
                <div id="form-btn">
                    <input type="reset" id="reset-btn" class="btn" value="Cancelar">
                    <input type="submit" id="submit-btn" class="btn" value="Cadastrar">
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