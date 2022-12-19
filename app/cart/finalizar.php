<?php
    include_once "../../public/data.php";

    //verifica se não há uma sessão iniciada, se não houver, inicia uma nova sessão
    if(!isset($_SESSION))
        session_start();

    //se existir o carrinho na sessão    
    if(isset($_SESSION['carrinho'])){
        //percorrer todos os itens do carrinho
           //contar os itens que atenderam ao requisito de quantidade
        $qt_itens_qt_ok = 0;        //DECLARAR ANTES DO FOREACH
        foreach($_SESSION['carrinho'] as $item){
            //para cada item, localizar no array $todos_produtos e atualizar a quantidade
            
            //conta a número de produtos cadastrados
            $qt_produtos = count($all_products);

            $item['qt'] = $item['product_quantity'];

            //perquisar o id no array $todos_produtos
            $i = 0;

            while($i < $qt_produtos && $all_products[$i]['product_id'] != $item['product_id'])
                 $i++;
                 if($i < $qt_produtos){
                
                    //verificar se a quantidade no carrinho é menor ou igual ao estoque
                    if($item['product_quantity'] <= $all_products[$i]['product_quantity']){
                         //atualizar a quantidade o array $todos_produtos
                         $all_products[$i]['product_quantity'] -= $item['product_quantity'];
                         $qt_itens_qt_ok++;
                    }
                
               } //fim  if($i < $qt_produtos)//fim  if($i < $qt_produtos)
            }//fim foreach
            //verificar se a quantidade de produtos que atendem ao requisito de quantidade é
        //a mesma quantidade de itens no carrinho -> todos os produtos atenderam ao requisito

        if($qt_itens_qt_ok == count($_SESSION['carrinho'])){
            //atualizar a variável da sessão
            $_SESSION['all_products'] =  $all_products;


            $carrinho = $_SESSION['carrinho'];
            $user = $_SESSION['user'];

            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $total_compra = $_SESSION['total_compra'];
                newOrder($carrinho, $total_compra, $user, $conn);
            }else{
                header("Location:../user/login.php");
            }

            //limpar o carrinho
            unset($_SESSION['carrinho']);
            unset($_SESSION['total_compra']);
            
            //guarda na sessão que a compra deu certo
            $_SESSION['compra_efetuada'] = true;

  }//fim  if(isset($_SESSION['carrinho']))
}
        //redireciona para página mensagem.
    header("Location:mensagem.php");
    ?>
    
    