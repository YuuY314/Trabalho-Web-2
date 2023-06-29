<?php
    include_once("conn.php");

    date_default_timezone_set("America/Sao_Paulo");

    class User {
        public $name;
        public $email;
        public $password;    
        public $projectSubscription;
    }

    class Project {
        public $name;
        public $category;
    }

    if(isset($_POST["register-user"])){
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

        if(isset($_POST["projects"])){
            $usuario->projectSubscription = $_POST["projects"];
        }

        $passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);

        $sqlRegisterUser = $conn->prepare("INSERT INTO usuario(nome_usuario, email, senha) VALUES(?, ?, ?)");
        $sqlRegisterUser->execute(array($usuario->name, $usuario->email, $passwordHash));

        if(isset($_POST["projects"])){
            $sqlSelect = $conn->prepare("SELECT * FROM usuario WHERE id = (SELECT MAX(id) FROM usuario)");
            $sqlSelect->execute();
            $fetch = $sqlSelect->fetchAll();
            foreach($fetch as $item){
                $id_usuario = $item["id"];
            }

            $sqlRegisterSubscription = $conn->prepare("INSERT INTO usuario_projeto(data_inscricao, id_usuario, id_projeto) VALUES(?, ?, ?)");
            $sqlRegisterSubscription->execute(array(date("Y-m-d"), $id_usuario, $usuario->projectSubscription));
        }
    }
    
    if(isset($_POST["register-project"])){
        $projeto = new Project();

        if(isset($_POST["name"])){
            $projeto->name = $_POST["name"];
        }

        if(isset($_POST["category"])){
            $projeto->category = $_POST["category"];
        }

        $sqlRegisterProject = $conn->prepare("INSERT INTO projeto(nome, categoria) VALUES(?, ?)");
        $sqlRegisterProject->execute(array($projeto->name, $projeto->category));
    }

    if(isset($_POST["update-user"])){
        $usuario = new User();

        $id = $_POST["id"];

        if(isset($_POST["name"])){
            $usuario->name = $_POST["name"];
        }
        if(isset($_POST["email"])){
            $usuario->email = $_POST["email"];
        }

        if(isset($_POST["password"])){
            $usuario->password = $_POST["password"];
        }

        $passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);

        $sqlUpdateRegister = $conn->prepare("UPDATE usuario SET nome_usuario = ?, email = ?, senha = ? WHERE id = $id");
        $sqlUpdateRegister->execute(array($usuario->name, $usuario->email, $passwordHash));
    }

    if(isset($_POST["update-project"])){
        $projeto = new Project();

        $id = $_POST["id"];

        if(isset($_POST["name"])){
            $projeto->name = $_POST["name"];
        }

        if(isset($_POST["category"])){
            $projeto->category = $_POST["category"];
        }

        $sqlUpdateRegister = $conn->prepare("UPDATE projeto SET nome = ?, categoria = ? WHERE id = $id");
        $sqlUpdateRegister->execute(array($projeto->name, $projeto->category));
    }

    if(isset($_POST["return"])){
        header("Location: ../list.php");
    }

    header("Location: ../list.php");
?>