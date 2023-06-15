<?php
include("./Menu_front/topo.php");
include("./classes/carrinho.php");
include("./store.php");

session_start();

// var_dump($store);

if ($_SESSION["carrinho"] == null) {
  // var_dump($_SESSION["carrinho"]);
  $carrinho = new Carrinho;
  $_SESSION["carrinho"] = $carrinho;
}





?>


<!-- <form method="get" action="Pagina_carrinho.php"> -->
  <!-- <div class="produtos" style='display: flex;margin: 0px 30px;'> -->
  <!-- <div class="row"> -->


    <?php


    // for ($i = 0; $i < count($store); $i++) {
    
    //   $item = $store[$i];
    
    //   echo "
    //   <div class='col-sm-2' >
    //     <div class='card' style='width: 18rem; margin: 0px 10px; margin-top: 20px;'>
    //       <img
    //         src='" . $item['imagem'] . "'
    //         class='card-img-top' alt='name'>
    //       <div class='card-body'>
    //         <h5 class='card-title'>" . $item['nome'] . "</h5>
    //         <p class='card-text'>" . $item['marca'] . "</p>
    //         <button class='btn btn-primary' name='add' value=".$item['item'] .">Adicionar ao carrinho</button>
    //       </div>
    //     </div>
    //   </div>";
    // }

    for ($i = 0; $i < count($store); $i++){
      $item = $store[$i];


      echo "
      <form class='col mb-5' method='get' action='Pagina_carrinho.php'>
        <div class='card h-100'>
            <!-- Product image-->
            <img class='card-img-top' src='". $item['imagem'] ."' alt='...' />
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
                <div class='text-center'><button class='btn btn-outline-dark mt-auto' name='add' value=".$item['item'] .">Adicionar ao carrinho</a></div>
            </div>
        </div>
      </form>
      ";
    }
    

    ?>


  <!-- <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div> -->




<!-- </div> -->






  <!-- </div> -->
<!-- </form> -->

<?php include("./Menu_front/rodape.php"); ?>