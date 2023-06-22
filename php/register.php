<?php
    include_once("conn.php");

    class User {
        public $name;
        public $email;
        public $password;    
        public $isSubscribedToGame;
        public $isSubscribedToBook;
    }

    $usuario = new User();

    if(isset($_POST["name"])){
        $usuario->name = $_POST["name"];
    }
    if(isset($_POST["email"])){
        $usuario->email = $_POST["email"];
    }

    if(isset($_POST["password"])){
        $usuario->password = $_POST["password"];
    }

    if(isset($_POST["game"])){
        $usuario->isSubscribedToGame = $_POST["game"];
    }

    if(isset($_POST["book"])){
        $usuario->isSubscribedToBook = $_POST["book"];
    }

    $passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);

    $sqlRegisterUser = $conn->prepare("INSERT INTO usuario(nome_usuario, email, senha) VALUES(?, ?, ?)");
    $sqlRegisterUser->execute(array($usuario->name, $usuario->email, $passwordHash));

    $sqlSelect = $conn->prepare("SELECT * FROM usuario WHERE id = (SELECT MAX(id) FROM usuario)");
    $sqlSelect->execute();
    $fetch = $sqlSelect->fetchAll();
    foreach($fetch as $item){
        $id_usuario = $item["id"];
    }

    date_default_timezone_set("America/Sao_Paulo");

    if(isset($usuario->isSubscribedToGame) && isset($usuario->isSubscribedToBook)){
        $sqlRegisterSubscription = $conn->prepare("INSERT INTO usuario_projeto(data_inscricao, id_usuario, id_projeto) VALUES(?, ?, ?)");
        $sqlRegisterSubscription->execute(array(date("Y-m-d"), $id_usuario, $usuario->isSubscribedToGame));

        $sqlRegisterSubscription = $conn->prepare("INSERT INTO usuario_projeto(data_inscricao, id_usuario, id_projeto) VALUES(?, ?, ?)");
        $sqlRegisterSubscription->execute(array(date("Y-m-d"), $id_usuario, $usuario->isSubscribedToBook));
    } else if(isset($usuario->isSubscribedToGame) && !isset($usuario->isSubscribedToBook)){
        $sqlRegisterSubscription = $conn->prepare("INSERT INTO usuario_projeto(data_inscricao, id_usuario, id_projeto) VALUES(?, ?, ?)");
        $sqlRegisterSubscription->execute(array(date("Y-m-d"), $id_usuario, $usuario->isSubscribedToGame));
    } else if(isset($usuario->isSubscribedToBook) && !isset($usuario->isSubscribedToGame)){
        $sqlRegisterSubscription = $conn->prepare("INSERT INTO usuario_projeto(data_inscricao, id_usuario, id_projeto) VALUES(?, ?, ?)");
        $sqlRegisterSubscription->execute(array(date("Y-m-d"), $id_usuario, $usuario->isSubscribedToBook));
    }
    
    header("Location: ../list.php");
?>