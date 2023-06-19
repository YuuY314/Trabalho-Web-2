<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Maker Studio</title>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="img/icon.png">
</head>
<body>
    <header>
        <a href="index.php"><img src="img/icon.png" alt="Story Maker Studio" width=90 height=90></a>
        <nav>
            <ul>
                <li><a href="index.php">Projeto</a></li>
                <li><a href="about.php">Sobre</a></li>
                <li><a href="contact.php">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th colspan="2">Inscrições</th>
                    </tr>
                </thead>
                <tbody id="user-table">
                    <?php
                        echo "<tr class="tr-body" id="${players[i].id}">
                            <td>${players[i].name}</td>
                            <td>${players[i].wins}</td>
                            <td>${players[i].draws}</td>
                            <td>${players[i].loses}</td>
                            <td>${players[i].points}</td>
                            <td class="td-btn"><button onclick="addWin(this)">Vitória</td>
                            <td class="td-btn"><button onclick="addDraw(this)">Empate</td>
                            </tr>";
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy Story Maker Studio</p>
        <p>Desenvolvido por <a href="https://github.com/YuuY314" target="_blank" id="github-link">Rafael Yu</a></p>
    </footer>
</body>
</html>