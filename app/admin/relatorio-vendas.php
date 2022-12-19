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
<div class="container text-center my-4">
    <h2 class="font-weight-bold display-4 text-sucess">
        <?=TITLE?>
    </h2>
    <h3 class="text-secondary">
        Relatório de Vendas
    </h3>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Data</th>
            <th scope="col">Valor</th>
            <th scope="col">Cliente</th>
            <th scope="col">Abrir Venda</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($all_orders as $order): ?>
        <tr >
            <th scope="row"><?=$order['order_id']?></th>
            <td><?=$order['date']?></td>
            <td>R$<?= number_format($order['amount'],2,',','') ?></td>
            <td><?= getUsernameByUserID($order['user_id'], $conn) ?></td>
            <td><a href="../order/vieworder.php?order_id=<?=$order['order_id']?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</main>