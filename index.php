<?php
  session_start();
  if(isset($_GET["product_id"])){
    $_SESSION["active_product"] = $_GET["product_id"];
  }


  if(isset($_POST["clear_all"])){
    unset($_SESSION["shopping_cart"]);
  }

  

  if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
     foreach($_SESSION["shopping_cart"] as $key => $value){
       if($key == $_GET["id"]){
         unset($_SESSION["shopping_cart"][$key]);
       }
       
     }
    }
  }

  if(isset($_GET["purchase"])){
    if($_GET["purchase"] == "cancel"){
      unset($_SESSION["shopping_cart"]);
      unset($_SESSION["active_product"]);
    }
  }

if(isset($_POST["home"])){
    unset($_SESSION["shopping_cart"]);
      unset($_SESSION["active_product"]);
}
  


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/purecss@1.0.1/build/pure-min.css"
      integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css" />
    <script src="https://kit.fontawesome.com/ae3245f36b.js" crossorigin="anonymous"></script>
    <title>Document</title>
  </head>

  <body>
    <div class="container">
      <!-- <div class="parent">
        <h1>Grocery Store</h1>
      </div> -->

      <form action="index.php" name="product-details" id="product-details" method="GET">
        <input type="hidden" value="" id="product_id" name="product_id" class="product_id" />
      </form>

      <div class="left-frame">
      <img id="root-nav" src="images/root.png" alt="" />
        <img id="product-nav" src="images/categories.png" alt="" usemap="#store-nav" />
        <img id="product-node" src="" alt="" />
        <map name="store-nav">
          <area shape="rect" href="#" alt="Frozen Food" coords="5,0,110,100" onmouseover="frozenFood()" />
          <area shape="rect" href="#" alt="Fresh Food" coords="125,0,235,100" onmouseover="freshFood()" />
          <area shape="rect" href="#" alt="Beverages" coords="250,0,350,100" onmouseover="beverages()" />
          <area shape="rect" href="#" alt="Home Health" coords="370,0,480,100" onmouseover="homeHealth()" />
          <area shape="rect" href="#" alt="Pet Food" coords="485,0,590,100" onmouseover="petFood()" />
        </map>

        <map name="frozen-food">
          <area shape="rect" href="#" alt="Hamburger Patties" coords="5,28,123,110" onclick="getData(1002)" />
          <area shape="rect" href="#" alt="Fish Fingers 500g" coords="120,150,210,210" onclick="getData(1000)" />
          <area shape="rect" href="#" alt="Fish Fingers 1000g" coords="245,150,330,210" onclick="getData(1001)" />
          <area shape="rect" href="#" alt="Shelled Prawns" coords="320,28,450,110" onclick="getData(1003)" />
          <area shape="rect" href="#" alt="Ice Cream 1L" coords="390,150,480,210" onclick="getData(1004)" />
          <area shape="rect" href="#" alt="Ice Cream 2L" coords="510,150,599,210" onclick="getData(1005)" />
        </map>

        <map name="fresh-food">
          <area shape="rect" href="#" alt="TBone Steak" coords="5,58,70,118" onclick="getData(3002)" />
          <area shape="rect" href="#" alt="Cheddar Cheese 500g" coords="15,170,110,230" onclick="getData(3000)" />
          <area shape="rect" href="#" alt="Cheddar Cheese 1000g" coords="145,170,230,230" onclick="getData(3001)" />
          <area shape="rect" href="#" alt="Navel Oranges" coords="175,58,245,118" onclick="getData(3003)" />
          <area shape="rect" href="#" alt="Bananas" coords="265,58,335,118" onclick="getData(3004)" />
          <area shape="rect" href="#" alt="Grapes" coords="350,58,420,118" onclick="getData(3006)" />
          <area shape="rect" href="#" alt="Apples" coords="440,58,510,118" onclick="getData(3007)" />
          <area shape="rect" href="#" alt="Peaches" coords="530,58,595,118" onclick="getData(3005)" />
        </map>

        <map name="beverages">
          <area shape="rect" href="#" alt="Coffee 200 grams" coords="5,178,70,240" onclick="getData(4003)" />
          <area shape="rect" href="#" alt="Coffee 500 grams" coords="90,178,155,240" onclick="getData(4004)" />
          <area shape="rect" href="#" alt="Earl Grey Tea Bags pack 25" coords="200,178,270,240" onclick="getData(4000)" />
          <area shape="rect" href="#" alt="Earl Grey Tea Bags pack 100" coords="300,178,370,240" onclick="getData(4001)" />
          <area shape="rect" href="#" alt="Earl Grey Tea Bags pack 200" coords="398,178,470,240" onclick="getData(4002)" />
          <area shape="rect" href="#" alt="Chocolate Bar" coords="497,55,597,127" onclick="getData(4005)" />
        </map>

        <map name="home-health">
          <area shape="rect" href="#" alt="Bath Soap" coords="3,58,90,120" onclick="getData(2002)" />
          <area shape="rect" href="#" alt="Panadol pack 24" coords="80,170,150,235" onclick="getData(2000)" />
          <area shape="rect" href="#" alt="Panadol bottle 50" coords="190,170,260,235" onclick="getData(2001)" />
          <area shape="rect" href="#" alt="Washing powder" coords="255,58,350,120" onclick="getData(2005)" />
          <area shape="rect" href="#" alt="Garbage bags small(pack 10)" coords="315,170,400,235" onclick="getData(2003)" />
          <area shape="rect" href="#" alt="Garbage bags large(pack 50)" coords="440,170,530,235" onclick="getData(2004)" />
          <area shape="rect" href="#" alt="Laundry bleach" coords="510,58,597,120" onclick="getData(2006)" />
        </map>

        <map name="pet-food">
          <area shape="rect" href="#" alt="Bird Food" coords="3,58,105,120" onclick="getData(5002)" />
          <area shape="rect" href="#" alt="Cat Food" coords="160,58,265,120" onclick="getData(5003)" />
          <area shape="rect" href="#" alt="Dry Dog Food 1kg pack" coords="280,170,365,235" onclick="getData(5001)" />
          <area shape="rect" href="#" alt="Dry Dog Food 5kg pack" coords="400,170,490,235" onclick="getData(5000)" />
          <area shape="rect" href="#" alt="Fish Food" coords="485,58,590,120" onclick="getData(5004)" />
        </map>
      </div>
      <div class="right-frame">
        <div class="top-right-frame" id="top-right">
          <h1 id="toggle">Product Information</h1>
          <?php include 'productDetails.php' ?>
          <?php include 'orderSummary.php' ?>
        </div>
        <div class="bottom-right-frame" id="bottom-right">
          <h1 id="toggle1"><i class="fas fa-shopping-cart"></i> Shopping Cart</h1>
          <?php include 'shoppingCart.php'?>
          <?php include 'purchaseForm.php'?>
          <?php include 'purchaseFormAction.php' ?>
        </div>
      </div>
    </div>
   

    

    <script src="script.js"></script>
  </body>
</html>

<?php



?>
