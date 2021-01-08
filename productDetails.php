<?php 

$server = "rerun";
$username = "potiro";
$password = "pcXZb(kL";
$db = "poti";
$active_product = "";

$conn = mysqli_connect($server, $username, $password, $db);

if($conn->connect_error){
    die("Connection failed: " . $conn ->connect_error);
}




if(isset($_SESSION["active_product"])){

    $active_product = $_SESSION["active_product"];

    $query = "select * from products where product_id = $active_product";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if($num_rows > 0){

        $product_id;
        $product_name;
        $price;

        while($row = mysqli_fetch_array($result)){
            $product_id = $row["product_id"];
            $product_name = $row["product_name"];
            $unit_price = $row["unit_price"];
            $unit_quantity = $row["unit_quantity"];
            $in_stock = $row["in_stock"];

        }

         
        print "
        <table id='product-info-table' class='pure-table pure-table-bordered'>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Unit Quantity</th>
            <th>In Stock</th>
            <th>Quantity Needed</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>$product_id</td>
            <td>$product_name</td>
            <td>$unit_price</td>
            <td>$unit_quantity</td>
            <td>$in_stock</td>
            <form action='index.php' method='post'>
              <td>
                <input style='text-align: center;' id='input-number' type='number' name='quantity_needed' min='1' max='$in_stock' value='1' required/>
                
                <input type='hidden' name='product_id' value='$product_id'/>
                <input type='hidden' name='product_name' value='$product_name'/>
                <input type='hidden' name='unit_price' value='$unit_price'/>
                <input type='hidden' name='unit_quantity' value='$unit_quantity'/>
                <input type='hidden' name='in_stock' value='$in_stock'/>
                <button type='submit' name='add_to_cart' class='btn btn-success'>Add to Cart</button>
              </td>
            </form>
          </tr>
        </tbody>
      </table>

" ;
    }
   
}else{
  print "<h4>Please choose a product to display product details</h4>";
}

mysqli_close($conn);

?>