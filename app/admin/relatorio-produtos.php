<?php 

require_once "../../config.php";

if(!isset($_SESSION)){
    session_start();
}

include "../layouts/header.php";
include "../layouts/menu-cliente.php";
require_once "../../public/data.php";

$total_price = 0;
$itens_em_estoque = 0;

?>

<main>
<div class="container text-center my-4">
    <h2 class="font-weight-bold display-4 text-sucess">
        <?=TITLE?>
    </h2>
    <h3 class="text-secondary">
        Relatório de Produtos. 
    </h3>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço Unitário</th>
            <th scope="col">Preço Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($all_products as $product): ?>
        <tr>
            <th scope="row"><?=$product['product_id']?></th>
            <td><?=$product['product_name']?></td>
            <td><?=$product['product_quantity']?></td>
            <?php $itens_em_estoque += $product['product_quantity'] ?>
            <td>R$<?= number_format($product['price'],2,',','') ?></td>
            <td>R$<?= number_format($product['price'] * $product['product_quantity'],2,',','') ?></td>
            <?php $total_price += $product['price'] * $product['product_quantity'] ?>
        </tr>
        <?php endforeach; ?>
        <!-- a total line for total price -->
        <tr>
            <th scope="row">Total</th>
            <td></td>
            <td><?= $itens_em_estoque ?></td>
            <td></td>
            <td>R$<?= number_format($total_price,2,',','') ?></td>
        </tr>
    </tbody>
</table>

</main>