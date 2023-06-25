<?php
  $con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'egyhardware');
  $sql = "SELECT * FROM products WHERE featured = 2";
  $featured = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .row {
    --bs-gutter-x: 0px;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
    }
    </style>
    <title>WooCommerce Web page</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style = "position:fixed; width:100%; z-index:2">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">WooCommerce Mitch Design</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarScroll" style="padding-left: 50vw;">
      <ul class="navbar-nav me-auto my-2 my-lg-2 navbar-nav-scroll " style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="laptops.php">Laptops</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="phones.php">Mobile Phones</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="gpus.php">Graphics Cards</a></li>
            </ul>
        </li>
        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="shoppingCart.php">Shopping Cart</a>
        </li>
      </ul>
    </div>
  </div>
</nav><br><br>

<h2 class="text-center" style="margin-top: 3vw;">Laptops</h2><br><br>            
  
    
<div class="col-mid-12" style= "padding: 0px 0px 25px;">
    <div class="row" style="--bs-gutter-x: 0px;">
        <?php
            while($products = mysqli_fetch_assoc($featured)):


        ?>
        <div class="col-md-4" style = "text-align: center;">
        <h4> <?= $products['title'];?></h4>
        <img src="<?=$products['image'];?>" alt="<?=$products['title'];?>">
        <p class="desc" style="padding: 0vw 5vw;"><?=$products['description'];?></p>
        <p class="lprice">EGP <?=$products['price'];?></p>
        <div class="buy-button"  style = "padding-bottom: 19px;">
        <a href="shoppingCart.php">
            <button type = "button" class = "btn btn-success" data-toggle="modal" data-target = "#order-1">Add To Cart</button>
        </a>
        </div>
        </div>
        <?php endwhile;?>
    </div>
</div> 
<script src="./js/master.js"></script> 
</body>
</html>