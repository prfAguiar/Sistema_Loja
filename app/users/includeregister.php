<?php 

include "../../public/data.php";

$nome = isset($_POST["inputNome"]) ? $_POST["inputNome"] : null;
$telefone = isset($_POST["inputTelefone"]) ? $_POST["inputTelefone"] : null;
$endereco = isset($_POST["inputEndereco"]) ? $_POST["inputEndereco"] : null;
$cidade = isset($_POST["inputCidade"]) ? $_POST["inputCidade"] : null;
$email = isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : null;
$senha = isset($_POST["inputSenha"]) ? $_POST["inputSenha"] : null;
$confirmaSenha = isset($_POST["inputConfirmSenha"]) ? $_POST["inputConfirmSenha"] : null;

if($nome != null && $telefone != null && $endereco != null && $cidade != null && $email != null && $senha != null && $confirmaSenha != null){

    if($senha == $confirmaSenha){
        $user = [
            "nome" => $nome,
            "telefone" => $telefone,
            "endereco" => $endereco,
            "cidade" => $cidade,
            "email" => $email,
            "password" => $senha
        ];
        $sql = "INSERT INTO user (user_name, email, password, type, phone, adress, city) VALUES ('$nome', '$email', '$senha', 2, '$telefone', '$endereco', '$cidade')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo
            "<script>
                alert('Usuário cadastrado com sucesso!');
                window.location.href = 'login.php';
            </script>";
        }else{
            echo
            "<script>
                alert('Erro ao cadastrar usuário!');
                window.location.href = 'register.php';
            </script>";
        }
    }else{
        echo
        "<script>
            alert('As senhas não conferem!');
            window.location.href = 'register.php';
        </script>";
        header("Refresh: 3; url=register.php");
    }
}

?>