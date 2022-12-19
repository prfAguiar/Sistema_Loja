<?php 
    require_once "../../config.php";

    if(!isset($_SESSION)){
        session_start();
    }

    include "../layouts/header.php";
    include "../layouts/menu-cliente.php";
    require_once "../../public/data.php"

?>

<main>
  <div class="container mt-3">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="#" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">  
        <?php

            //verifica se exitem dados para serem exibidos
            if(!isset($all_products) || !($all_products)){
        ?>
            <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
            <?php

//verifica se exitem dados para serem exibidos
if(!isset($all_products) || !($all_products)){
?>
        <?php
            } else {
        ?>     
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead >
                    <tr class="text-center table-secondary">
                        <th scope="col" >Cod. </td>
                        <th scope="col" >Img.</td>
                        <th scope="col" >Nome</td>
                        <th scope="col" >Descrição</td>
                        <th scope="col" >Categoria</td>
                        <th scope="col" >Estoque</td>
                        <th scope="col" >Preço</td>
                        <th scope="col" >Ação</td>
                    </tr>
                </thead>
                <?php
                    foreach($all_products as $product) {
                        
                        $img_path = IMG."products/".$product['img_path'];
                        $category_id = $product['category_id'];
                        
                        //$all_categories declarado em data.php - simulando banco de dados
                        foreach ($all_categories as $value) {
                            if ($value['category_id'] === $category_id) {
                                //achou a categoria referente ao produto
                                $category = $value;
                            }
                        }
                      
                ?>
                    <tr>
                        <td class="text-center"><?= $product['product_id'] ?></td>
                        <td >
                            <img src="<?=$img_path?>" alt="<?=$product['product_name']?>" width="60" height="60">
                        </td>
                        <td > <?= $product['product_name'] ?> </td>
                        <td class="col-3"> <?= $product['product_description'] ?> </td>
                        <td > <?= $category['category_name'] ?> </td>
                        <td class="text-center col-1"> <?= $product['product_quantity'] ?> </td>
                        <td class="text-center col-1"> R$ <?= number_format($product['price'],2,',','')  ?> </td>
                        <td  class="text-center col-2">
                            <a href="http://<?= APP_HOST ?>/app/product/edit.php?id=<?= $product['product_id']?>" class="btn btn-info btn-sm">Editar</a>
                            <a href="http://<?= APP_HOST ?>/app/product/delete.php?id=<?= $product['product_id']?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                 
                <?php
                    }  //fim foreach
                ?>
                 </table>
            </div>
        <?php
            } //fim if-else
        ?>
    </div>
</div>
</main>
n