<?php

    require "../../public/data.php";
    $sql = "DELETE FROM product WHERE product_id = \"" . $_GET['id'] . "\";";
    $result = $conn->query($sql);

    if($result){
        echo "Produto excluído com sucesso!";
    }else{
        echo "Erro ao excluir o produto!";
    }
    header('Location: cadastro-produto.php');
?>

