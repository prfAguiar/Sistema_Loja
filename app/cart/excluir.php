<?php
    //verifica se não há uma sessão iniciada, se não houver, inicia uma nova sessão
    if(!isset($_SESSION))
        session_start();

    //verificar se existe o carrinho
    if(isset($_SESSION['carrinho'])){
        //recebe o id do produto que será excluído
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            foreach($_SESSION['carrinho'] as $i => $item){
                if($item['product_id'] == $id){
                    //eliminar o item de índice $i da variável de sessão
                    unset($_SESSION['carrinho'][$i]);
                }    
            }//fim foreach
        }//fim if(isset($_GET['id']))
    }//fim  if(isset($_SESSION['carrinho']))

    //redireciona para página carrinho.php

    header("Location:carrinho.php");
?>
