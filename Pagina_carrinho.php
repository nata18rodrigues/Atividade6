<?php
include("./Carrinho_front/topo.php");
include("./classes/carrinho.php");
include("./store.php");

session_start();
$add = $_GET['add'];
$remove = $_GET['remove'];
$carrinho = $_SESSION["carrinho"];


// echo "<br>";

if ($add != null) {
  // echo "<br>add<br>";
  for ($i = 0; $i < count($store); $i++) {
    if ($store[$i]['item'] == $add) {
      $valor = $store[$i];
    }
  }
  $carrinho->adicionar($valor);
}
if ($remove != null) {
  // echo "<br>remove<br>";
  for ($i = 0; $i < count($store); $i++) {
    if ($store[$i]['item'] == $remove) {
      $valor = $store[$i];
    }
  }
  $carrinho->remover($valor);
}


$_SESSION["carrinho"] = $carrinho;

if($remove != null) {
  $operador = $remove;
}
if($add != null) {
  $operador = $add;
}
for ($i = 0; $i < count($carrinho->carrinho); $i++) {

  if ($carrinho->carrinho[$i]['item'] == $operador) {
    $principal = $carrinho->carrinho[$i];
  }
}

?>



<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
      <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
          src=<?php echo $principal['imagem'];  ?> alt="..." /></div>
      <div class="col-md-6">
        <div class="small mb-1">SKU: BST-498</div>
        <h1 class="display-5 fw-bolder"><?php echo $principal['nome'];  ?></h1>
        <div class="fs-5 mb-5">
          <span class="text-decoration-line-through">$<?php echo $principal['valor'] + 5;  ?></span>
          <span><?php echo $principal['valor'];  ?></span>
        </div>
        <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam
          sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste
          laborum vero?</p> -->
        <div class="d-flex">
          <input class="form-control text-center me-3" id="inputQuantity" type="num" value=<?php echo $principal['quant_carrinho'];  ?> disabled
            style="max-width: 3rem" />
          <button class="btn btn-outline-dark flex-shrink-0" type="button">
            <i class="bi-cart-fill me-1"></i>
            Add to cart
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Related items section-->



<section class="py-5 bg-light">
  <div class="container px-4 px-lg-5 mt-5">
    <h2 class="fw-bolder mb-4">Related products</h2>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


      <?php
      for ($i = 0; $i < count($carrinho->carrinho); $i++) {

        $item = $carrinho->carrinho[$i];


        echo "                    
          <form class='col mb-5' method='get' action='Pagina_carrinho.php'>
            <div class='card h-100'>
                <!-- Product image-->
                <img class='card-img-top' src='" . $item['imagem'] . "' alt='...' />
                <!-- Product details-->
                <div class='card-body p-4'>
                    <div class='text-center'>
                        <!-- Product name-->
                        <h5 class='fw-bolder'>" . $item['nome'] . "</h5>
                        <!-- Product price-->
                        " . $item['valor'] . "
                    </div>
                </div>
                <!-- Product actions-->
                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                    <div class='text-center' style='display: inline-flex;'>
                      <button class='btn btn-outline-dark mt-auto' name='add' value=" . $item['item'] . ">+</button>
                      <input class='form-control text-center me-3' style='width: 50px; margin: 0px 20px 0;' id='inputQuantity' type='num' value='" . $item['quant_carrinho'] . "' disabled>
                      <button class='btn btn-outline-dark mt-auto' name='remove' value=" . $item['item'] . ">-</a>
                    </div>


                    <div class='text-center'></div>
                </div>
            </div>
          </form>";
      }

      include("./Carrinho_front/rodape.php");
      ?>