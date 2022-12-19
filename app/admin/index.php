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
        Novas ideias facilitam sua vida. 
    </h3>
</div>

<!-- bootstrap button "Abrir Cadastro de Produtos" -->
<div class="container text-center my-4">
    <a href="../product/cadastro-produto.php" class="btn btn-success">Abrir Cadastro de Produtos</a>
</div>

<!-- Abrir Cadastro de clientes -->
<div class="container text-center my-4">
    <a href="user-management.php" class="btn btn-success">Abrir Cadastro de Clientes</a>
</div>

<!-- relatório de vendas -->
<div class="container text-center my-4">
    <a href="relatorio-vendas.php" class="btn btn-success">Relatório de Vendas</a>
</div>

<!-- relatorio de produtos -->
<div class="container text-center my-4">
    <a href="relatorio-produtos.php" class="btn btn-success">Relatório de Produtos</a>
</div>

</main>