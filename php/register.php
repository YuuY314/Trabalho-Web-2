<?php
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];

    $db = "usuario";
    $dbuser = "root";
    $dbpassword = "";

    try {
        $conn = new PDO("mysql:host=localhost;port=3307;dbname=$db", $dbuser, $dbpassword, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die($e->getMessage());
    }

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
    } else {
        $usuario->isSubscribedToGame = 0;
    }

    if(isset($_POST["book"])){
        $usuario->isSubscribedToBook = $_POST["book"];
    } else {
        $usuario->isSubscribedToBook = 0;
    }

    $sqlInsert = $conn->prepare("INSERT INTO usuario(nome_usuario, email, senha, id_jogo, id_livro) VALUES(?, ?, ?, ?, ?)");
    $sqlInsert->execute(array($usuario->name, $usuario->email, $usuario->password, $usuario->isSubscribedToGame, $usuario->isSubscribedToBook));
    
    header("Location: ../home.php");
?>