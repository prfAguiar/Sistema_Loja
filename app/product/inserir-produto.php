<?php

    require "../../public/data.php";

        //recuperar os dados do POST
        $nome = isset($_POST["inputNome"]) ? $_POST["inputNome"] : null;
        $descricao = isset($_POST['inputDescricao']) ? $_POST['inputDescricao'] : null;
        $preco = isset($_POST['inputPreco']) ? $_POST['inputPreco'] : null;
        $qt = isset($_POST['inputQt']) ? $_POST['inputQt'] : null;
        $img = isset($_POST['inputImg']) ? $_POST['inputImg'] : null;
        $categoria = isset($_POST['inputCategoria']) ? $_POST['inputCategoria'] : null;

        //testar se as variáveis não são nulas
        if($nome != null && $descricao != null && $preco != null && $qt != null && $img != null && $categoria != null){
            //insere no banco
            //comando sql para inserir, utilizando parâmetros values
            $sql = "INSERT INTO product (product_name, product_description, img_path, price, product_quantity, category_id) VALUES (" . "\"" . $nome . "\",\"" . $descricao . "\",\"" . $img . "\",\"" . $preco . "\",\"" . $qt . "\",\"" . $categoria . "\")";

            //executar o comando sql
            $result = $conn->query($sql);

            //testar se o comando foi executado
            if($result){
                echo "Produto inserido com sucesso!";
            }else{
                echo "Erro ao inserir o produto!";
            }

            header('Location: cadastro-produto.php');
        }else{
            echo "Dados nulos<br>\n";
        }
?>

