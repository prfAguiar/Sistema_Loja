<?php

if(!isset($_SESSION)){
    session_start();
  }

include "../../public/data.php";

$email = isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : null;
$senha = isset($_POST["inputSenha"]) ? $_POST["inputSenha"] : null;

if($email != null && $senha != null){
    foreach($all_users as $user){
        if($user["email"] == $email && $user["password"] == $senha){
            $_SESSION["user"] = $user;
            echo
            "<script>
                alert('Logado com sucesso!');
                window.location.href = '../../index.php';
            </script>";
        }
    }

    echo
    "<script>
        alert('Email ou senha incorretos!');
        window.location.href = 'login.php';
    </script>";
    header("Refresh: 3; url=login.php");
}
?>