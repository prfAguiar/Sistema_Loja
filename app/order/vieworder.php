<?php 

require_once "../../config.php";

if(!isset($_SESSION)){
    session_start();
}

include "../layouts/header.php";
include "../layouts/menu-cliente.php";
require_once "../../public/data.php";

$order_id = $_GET['order_id'];
$order = getOrderByOrderID($order_id, $conn);
$order_details = getAllOrderDetailsByOrderID($order_id, $conn);

?>

<main>
<div class="container text-center my-4">
    <h2 class="font-weight-bold display-4 text-sucess">
        <?=TITLE?>
    </h2>
    <h3 class="text-secondary">
        Relatório de Vendas
    </h3>
</div>

<h3 class="text-secondary"> Venda N°: <?= $order_id ?> </h3>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID do produto</th>
            <th scope="col">Nome do produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor Unitário</th>
            <th scope="col">Valor Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($order_details as $detail):
            $product = getProductByID($detail['product_id'], $conn);
            ?>
        <tr>
            <th scope="row"><?=$detail['product_id']?></th>
            <td><?=$product['product_name']?></td>
            <td><?=$detail['order_detail_quantity']?></td>
            <td>R$<?= number_format($product['price'],2,',','') ?></td>
            <td>R$<?= number_format($product['price'] * $detail['order_detail_quantity'],2,',','') ?></td>
        </tr>
        <?php endforeach; ?>
        <!-- a total line for total price -->
        <tr>
            <th scope="row">Total</th>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>R$<?= number_format($order['amount'],2,',','') ?></strong></td>
        </tr>
    </tbody>
</table>


</main>