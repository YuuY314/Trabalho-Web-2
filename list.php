<?php
    include_once("php/conn.php");
?>
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
                <li><a href="index.php"><strong>Home</strong></a></li>
                <li><a href="list.php"><strong>Listagem</strong></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <div>
            <h1><strong>Usuários</strong></h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome de Usuário</th>
                        <th>Email</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody id="user-table">
                    <?php
                        $sqlSelect = $conn->prepare("SELECT * FROM usuario");
                        $sqlSelect->execute();
                        $fetch = $sqlSelect->fetchAll();
                        foreach($fetch as $item){
                            $id_usuario = $item["id"];
                            $nome_usuario = $item["nome_usuario"];
                            $email = $item["email"];
                            $senha = $item["senha"];

                            echo "<tr class='tr-body'>
                                  <td>$id_usuario</td>
                                  <td>$nome_usuario</td>
                                  <td>$email</td>
                                  <td>$senha</td>
                                  </tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <form action="php/crud/user_crud.php" method="POST" class="actions">
                <input type="submit" name="insert-user" id="insert-user" class="btn" value="Inserir">
                <input type="submit" name="update-user" id="update-user" class="btn" value="Atualizar">
                <input type="submit" name="select-user" id="select-user" class="btn" value="Consultar">
                <input type="submit" name="delete-user" id="delete-user" class="btn" value="Excluir">
            </form>
        </section>
        <section>
            <div>
            <h1><strong>Projetos</strong></h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Projeto</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody id="project-table">
                    <?php
                        $sqlSelect = $conn->prepare("SELECT * FROM projeto");
                        $sqlSelect->execute();
                        $fetch = $sqlSelect->fetchAll();
                        foreach($fetch as $item){
                            $id_projeto = $item["id"];
                            $nome_projeto = $item["nome"];
                            $categoria = $item["categoria"];

                            echo "<tr class='tr-body'>
                                <td>$id_projeto</td>
                                <td>$nome_projeto</td>
                                <td>$categoria</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <form action="php/crud/project_crud.php" method="POST" class="actions">
                <input type="submit" name="insert-project" id="insert-project" class="btn" value="Inserir">
                <input type="submit" name="update-project" id="update-project" class="btn" value="Atualizar">
                <input type="submit" name="select-project" id="select-project" class="btn" value="Consultar">
                <input type="submit" name="delete-project" id="delete-project" class="btn" value="Excluir">
            </form>
        </section>
        <section>
            <div>
            <h1><strong>Inscrições</strong></h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data de Inscrição</th>
                        <th>ID Usuário</th>
                        <th>ID Projeto</th>
                    </tr>
                </thead>
                <tbody id="user-project-table">
                    <?php
                        $sqlSelect = $conn->prepare("SELECT * FROM usuario_projeto");
                        $sqlSelect->execute();
                        $fetch = $sqlSelect->fetchAll();
                        foreach($fetch as $item){
                            $id_usuario_projeto = $item["id"];
                            $data_inscricao = $item["data_inscricao"];
                            $id_usuario_up = $item["id_usuario"];
                            $id_projeto_up = $item["id_projeto"];

                            echo "<tr class='tr-body'>
                                <td>$id_usuario_projeto</td>
                                <td>$data_inscricao</td>
                                <td>$id_usuario_up</td>
                                <td>$id_projeto_up</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <form action="php/crud/user_project_crud.php" method="POST" class="actions">
                <input type="submit" name="select-up" id="select-up" class="btn" value="Consultar">
                <input type="submit" name="delete-up" id="delete-up" class="btn" value="Excluir">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy Story Maker Studio</p>
        <p>Desenvolvido por <a href="https://github.com/YuuY314" target="_blank" id="github-link">Rafael Yu</a></p>
    </footer>
</body>
</html>