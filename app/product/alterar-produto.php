<?php

require "../../public/data.php";

$id = $_GET['id'];

$product = getProductById($id, $conn);

$name = $product['product_name'];
$description = $product['product_description'];
$price = floatval($product['price']);
$quantity = intval($product['product_quantity']);
$img_path = $product['img_path'];
$prod_category = $product['category_id'];

?>

<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Editar Produto</title>
</head>

<body>

  <div class="jumbotron jumbotron-fluid bg-transparent">
    <div class="container ">
      <h1 class="display-6 text-secondary text-center">Editar Produto</h1>
    </div>
  </div>

  <!-- Form -->
  <div class="row justify-content-center">

    <div class="container col-md-6 ">

      <form action="alteracao-produto.php?id=<?php echo $id; ?>" method="POST">

        <!-- Row 1 -->
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome do produto" required value=" <?php echo $name; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputDescricao">Descrição</label>
            <textarea class="form-control" name="inputDescricao" id="inputDescricao" rows="10" placeholder="Descrição do produto" required> <?php echo $description; ?></textarea>
          </div>
        </div>

        <!-- Row 2 -->
        <div class="form-row">

          <div class="col-md-2 mr-3">
            <div class="form-group">
              <label for="inputPreco">Preço</label>
                <input type="number" class="form-control" name="inputPreco" id="inputPreco" placeholder="1,00" step="0.01" min="0" required value="<?php echo $price; ?>">
            </div>
          </div>

          <div class="form-group col-md-3 mr-3">
            <label for="inputQt">Quantidade</label>
            <input type="number" class="form-control" name="inputQt" id="inputQt" min="1" placeholder="1" required value="<?php echo $quantity; ?>">
          </div>

          <div class="form-group col-md-3 mr-3">
            <label for="inputImg">Imagem</label>
            <input type="text" class="form-control" name="inputImg" id="inputImg" min="1" placeholder="Caminho da Imagem" required value="<?php echo $img_path; ?>">
          </div>

          <div class="form-group col-md-3 mr-3">
            <label for="inputCategoria">Categoria</label>
            <select id="inputCategoria" name="inputCategoria" class="form-control">
              <?php foreach ($all_categories as $category) : ?>
                <option
                value="<?php echo $category['category_id']; ?>"
                <?php if ($category['category_id'] == $prod_category):
                      echo "selected=\"selected\""; endif; ?>><?php echo $category['category_name'] ?>
                </option>
            <?php endforeach; ?>
            </select>
            <!--<input type="text" class="form-control" name="inputQt" id="inputQt" min="1" placeholder="Caminho da Imagem" required>-->
            
          </div>

        </div>
        <!-- Row3 -->
        <div class="form-row justify-content-center mt-4">
          <button class="btn btn-outline-primary col-md-10" type="submit" name="btAlterar">Alterar</button>
        </div>
      </form>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-2">
                <a class="btn btn-outline-primary col-md-12" href="cadastro-produto.php" role="button">Voltar</a>
            </div>
        </div>
    </div>

  </div>
</body>