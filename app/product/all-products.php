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
    <h3 class="text-secondary mb-5">
        Novas ideias facilitam sua vida. 
    </h3>
</div>

<!--Grid Card-->
<!-- Page Content -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4">

    <?php 
        //$all_products foi declarado em data.php - simulando banco de dados
        foreach($all_products as $product) {
            //monta o caminho da imagem                    
            $img_path = IMG."products/".$product['img_path'];
    ?>
        <div class="col">
            <div class="card h-100 border-light">
                <img class="card-img-top" src="<?= $img_path ?>" alt="<?= $product['product_name'] ?>" >
                <div class="card-body">
                    <h6 style="height:75px;"class="card-title text-dark">
                        <?= $product['product_name'] ?>
                    </h6>
                    <textarea style="overflow-y: scroll; height: 300px;resize: none;}" class="card-text text-muted"><?= $product['product_description'] ?></textarea>
                    
                    <h5 class="card-text text-end text-info">R$<?= number_format($product['price'],2,',','') ?></h5>
                    
                </div>
                <div class="card-footer border-light">
                    <form action="../cart/adicionar.php" method="post" name="form_cart" id="form_cart">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="<?= $product['product_id'] ?>" >
                            <div class="col">
                                <input class="form-control " type="number" name="quantity" id="quantity" min="1" value="1">
                            </div>
                            <div class="col">
                                <button class="btn btn-success" type="submit" name="add_cart" data-bs-toggle="modal" data-bs-target="#cartModal">Adicionar</button>
                            </div>    
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php } //fim foreach
        ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
</main>

<!--modal-->
<!-- Vertically centered modal -->

<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModel"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
           
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6> Produto Adicionado ao carrinho. </h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continuar Comprando</button>
        <button type="submit" form = "form_cart" class="btn btn-primary">Finalizar Compra</button>
      </div>
    </div>
  </div>
</div>

<?php
    include "../layouts/footer.php";
?>
