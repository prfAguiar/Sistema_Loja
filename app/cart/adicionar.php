<?php
    include_once "../../public/data.php";

    if(!isset($_SESSION))
        session_start();

    $carrinho = isset($_SESSION['carrinho'])? $_SESSION['carrinho']: array();

    $quantity = $_POST['quantity'];

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $exist_item = false;

        foreach ($carrinho as $i => $item){
            if($item['product_id'] == $id){
                $exist_item = true;
                $carrinho[$i]['product_quantity'] += $quantity;
            }
        }

        if(!$exist_item){
            $qt_produtos = count($all_products);

            $i = 0;
            while($i < $qt_produtos && $all_products[$i]['product_id'] != $id)
                $i++;  
            if($i < $qt_produtos){ 
                $produto = $all_products[$i];
                $produto['product_quantity'] = $quantity;
                $carrinho[] = $produto;
            }
        }

        $_SESSION['carrinho'] = $carrinho;
    }

    header("Location:../product/all-products.php");
?>
