<?php include_once "../../public/data.php";?>

<?php
    if(!isset($_SESSION))
         session_start();
    $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : NULL;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Carrinho</title>
</head>

<body>
    <div class="jumbotron bg-transparent">
        <div class="container">
            <h1 class="display-6 text-secondary text-center">Carrinho</h1>
        </div>
    </div>
    <?php //verificar se o carrinho está vazio
        if($carrinho == NULL){  //mensagem informando que o carrinho está vazio
    ?>
<div class="container">
            <div class="alert alert-warning text-center" role="alert">
                <h3> Seu carrinho está vazio :( </h3>
                <hr>
                <a href="../product/all-products.php" class="alert-link"> Ir para Lista de Produtos</a>
            </div>
        </div>
        <?php 
        } else { //mostra a tabela com os produtos do carrinho
        ?>
    <div class="container">

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php  
   foreach ($carrinho as $item){ 
      $total = $item['product_quantity'] * $item['price']; 
      //alterar a variável link dentro do foreach
$link = "excluir.php?id=".$item['product_id'];
?>
                <tr>
                    <td><?php echo $item['product_id'];?></td>
                    <td><?php echo $item['product_name'];?></td>
                    <td><?php echo $item['product_quantity'];?></td>
                    <td><?php echo "R$ ". number_format($total,2,",",""); ?></td>
                    <td> <a class="btn btn-outline-primary" href=<?php echo $link; ?> role="button">Excluir do
                            Carrinho</a></td>
                </tr>
                <?php }?>

            </tbody>
        </table>

    </div>
    <?php 
   $total_compra = 0;
   foreach ($carrinho as $item){ 
      $total = $item['product_quantity'] * $item['price']; 
      $total_compra += $total; 
      $link = "#";
    }
    $_SESSION['total_compra'] = $total_compra;
?>   
<div class="container">
        <h3 class="text-secondary"> Total da Compra: R$ <?=number_format($total_compra,2,",","")?></h3>
    </div><div class="container">
            <!--Botão ir para produtos-->
            <a class="btn btn-primary" href="../product/all-products.php" role="button">Ir para Lista de Produtos</a>
            <!--Botão finalizar compra-->
            <a class="btn btn-success" href="finalizar.php" role="button">Finalizar Compra</a>
        </div>
        <?php 
}//fim if-else
?>  


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>