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
            $sql = "UPDATE product SET product_name = \"" . $nome . "\", product_description = \"" . $descricao . "\", price = \"" . $preco . "\", product_quantity = \"" . $qt . "\", img_path = \"" . $img . "\", category_id = \"" . $categoria . "\" WHERE product_id = \"" . $_GET['id'] . "\";";

            print_r($sql);

            //executar o comando sql
            $result = $conn->query($sql);

            //testar se o comando foi executado
            if($result){
                echo "Produto editado com sucesso!";
            }else{
                echo "Erro ao editar o produto!";
            }

            header('Location: alterar-produto.php?id=' . $_GET['id']);
        }else{
            echo "Dados nulos<br>\n";
        }
?>

