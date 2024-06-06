<?php
include 'includes/header.php';
//the authentication
?>
<div class="py-5">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h1>warehouse mangmint system</h1>
        <a href="ADMIN/index.php" class="btn  btn-outline-dark mt-4">Dashbord</a>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <section>
      <?php  
       
       $products = getAll('products');

      ?>
      <div class="row">
      <?php
          foreach($products as $product):
          ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
       
          <div class="card">
            <div class="cover item-a">
              <h1><?= $product['name']?></h1>
              <span class="price">$<?= $product['price']?></span>
              <div class="card-back">
                <a href="#">Add to cart</a>
                <a href="#">View detail</a>
              </div>
            </div>
          </div>
         
        </div>
        <?php endforeach ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="cover item-b">
              <h1>Tropical<br>Leaf</h1>
              <span class="price">$35</span>
              <div class="card-back">
                <a href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="cover item-c">
              <h1>Marijuana<br>Chill</h1>
              <span class="price">$155</span>
              <div class="card-back">
                <a href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <?php include 'includes/footer.php'; ?>