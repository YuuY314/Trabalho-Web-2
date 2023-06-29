<?php
    session_start();

    if(isset($_POST["select-user-id"])){
        $id_user = $_POST["select-user-id"];
        $_SESSION["select-user-id"] = $id_user;
    }

    if(isset($_POST["select-project-id"])){
        $id_project = $_POST["select-project-id"];
        $_SESSION["select-project-id"] = $id_project;
    }

    if(isset($_POST["select-up-id"])){
        $id_up = $_POST["select-up-id"];
        $_SESSION["select-up-id"] = $id_up;
    }


    include_once("conn.php");

    if(isset($_POST["insert-user"])){
        header("Location: user/insert.php");
    }

    if(isset($_POST["update-user"])){
        header("Location: user/update.php");
    }

    if(isset($_POST["select-user"])){
        header("Location: user/select.php");
    }

    if(isset($_POST["delete-user"])){
        $id = $_POST["select-user-id"];
        $sqlDelete = $conn->prepare("DELETE FROM usuario WHERE id = $id");
        $sqlDelete->execute();
        $sqlAlter = $conn->prepare("ALTER TABLE usuario AUTO_INCREMENT = 1");
        $sqlAlter->execute();
        header("Location: ../list.php");
    }

    if(isset($_POST["insert-project"])){
        header("Location: project/insert.php");
    }

    if(isset($_POST["update-project"])){
        header("Location: project/update.php");
    }

    if(isset($_POST["select-project"])){
        header("Location: project/select.php");
    }

    if(isset($_POST["delete-project"])){
        $id = $_POST["select-project-id"];
        $sqlDelete = $conn->prepare("DELETE FROM projeto WHERE id = $id");
        $sqlDelete->execute();
        $sqlAlter = $conn->prepare("ALTER TABLE projeto AUTO_INCREMENT = 1");
        $sqlAlter->execute();
        header("Location: ../list.php");
    }

    if(isset($_POST["select-up"])){
        header("Location: up/select.php");
    }

    if(isset($_POST["delete-up"])){
        $id = $_POST["select-up-id"];
        $sqlDelete = $conn->prepare("DELETE FROM usuario_projeto WHERE id = $id");
        $sqlDelete->execute();
        $sqlAlter = $conn->prepare("ALTER TABLE usuario_projeto AUTO_INCREMENT = 1");
        $sqlAlter->execute();
        header("Location: ../list.php");
    }
?>