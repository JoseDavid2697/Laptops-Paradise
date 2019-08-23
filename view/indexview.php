<?php

include_once 'public/header.php';

?>
<?php

include_once 'controller/ItemsController.php';
$it = new ItemsController();
$it->getItems();

?>

<!-- Page Content -->
<div class="container">

  <!-- Heading Row -->
  <div class="row align-items-center my-5">
    <div class="col-lg-7">
      <img class="img-fluid rounded mb-4 mb-lg-0" src="public/img/landing.jpg" alt="">
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
      <h1 class="font-weight-light" style="font-style: italic;">Laptop's Paradise</h1>
      <p style="font-style: italic;">To get a laptop is a great deal, our laptops have a insane quality all of them are build with the better materials out there!.</p>
    </div>

    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->

  <div class="card my-5 py-4 text-center" style="background-color: lightgray">
    <div class="card-body">
      <p class="text-black m-0" style="font-style: italic; font-size: 20px;">We have the best laptops in the market - Price & Quality harmony</p>
    </div>
  </div>

  <div class="card my-5 py-4 text-center" style="background-color: lightgray" id="productsTitle">
    <div class="card-body">
      <p class="text-black m-0" style="font-style: italic; font-size: 20px;">Take a look at our products</p>
    </div>
  </div>

  <div class="container" id="products">
    <!-- Content Row -->
    <div class="row">
      <?php 
          foreach ($_SESSION['items_list'] as $item) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="public/img/<?php echo $item["image"] ?>" alt="" height="151" with="86"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $item["item_name"] ?></a>
                  </h4>
                  <h5>$<?php echo $item["price"] ?></h5>
                  <p class="card-text"><?php echo $item["description"] ?>!</p>
                </div>
              </div>
            </div>
            <!-- /.col-md-4 -->
      <?php } ?>      
      <!-- /.row -->
    </div>

  </div>
  <!-- /.container -->

  <?php
  include_once 'public/footer.php';
  ?>