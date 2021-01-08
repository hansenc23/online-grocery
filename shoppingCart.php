<?php

session_start();

// if(isset($_GET["action"])){
//     if($_GET["action"] == "delete"){
//       foreach($_SESSION["shopping_cart"] as $key => $values){
//         if($key == $_GET["id"]){
//           unset($_SESSION["shopping_cart"][$key]);
//         }
//       }
//     }
//   }

//$_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;

// if(isset($_SESSION["shopping_cart"])){
//     $productID_exist = false;
//     foreach($_SESSION["shopping_cart"] as $key => $values){
//         if($key == $_POST["product_id"]){
//             $productID_exist = true;
//         break;
//         }
//     }
//     if($productID_exist == false){
//         $_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;
//     }else{
//         echo '<script>alert("product already exists")</script>';
//     }
// }else{
//     $_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;
// }

print "
    <table id='cart-table' class='pure-table pure-table-bordered'>
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Unit Quantity</td>
                <td>Order Quantity</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>";

        $product_id = $_POST["product_id"];

        if(isset($_POST["add_to_cart"])){


            
            $productInfo = array(
                '_id' => $_POST["product_id"],
                'product_name' => $_POST["product_name"],
                'unit_price' => $_POST["unit_price"],
                'unit_quantity' => $_POST["unit_quantity"],
                'in_stock' => $_POST["in_stock"],
                'quantity_needed' => $_POST["quantity_needed"]
            );

            if(isset($_SESSION["shopping_cart"])){
                $productID_exist = false;

                foreach($_SESSION["shopping_cart"] as $key => $value){
                    if($key == $_POST["product_id"]){
                        $productID_exist = true;

                    break;
                    }
                }

                if($productID_exist == false){
                    $_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;
                }else{
                   echo "<script>alert('Product already exists. Please remove the product from your shopping cart first');</script>";
                }

            }else{
               // $_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;
                $_SESSION["shopping_cart"][$_POST["product_id"]] = $productInfo;
            }

            
        }

        

        foreach($_SESSION["shopping_cart"] as $key => $value){
               
            $_id = $value["_id"];
            $product_name = $value["product_name"];
            $unit_quantity = $value["unit_quantity"];
            $quantity_needed = $value["quantity_needed"];
            $price = number_format($value["unit_price"] * $quantity_needed, 2);

            print "
                <tr>
                    <td>$product_name</td>
                    <td>$unit_quantity</td>
                    <td>$quantity_needed</td>
                    <td>$ $price</td>
                    
                        <td>
                            <a id='remove_single' href='?action=delete&id=$_id'>Remove</a>
                        </td>
                    
                </tr>
            ";
        }
    
        $total_price = 0;

        foreach($_SESSION["shopping_cart"] as $key => $value){
            $total_price += $value["quantity_needed"] * $value["unit_price"];
        }

        $formatted_total = number_format($total_price, 2);
        
        print "
            <tr>
                <td colspan='3' style='text-align: right;'><strong>TOTAL</strong></td>
                
               
                <td>$ $formatted_total</td>


                <form action='index.php' method=post>
                    <td><button type='submit' name='clear_all' class='btn btn-danger'>Clear All</button></td>
                </form>
            </tr>

            <form action='index.php' method=post>
                <tr>
                    <td colspan='5' style='text-align: center;'>
                    
                        <button type='submit' id='checkout_btn' name='checkout' class='btn btn-success'>Checkout</button>
                    
                    </td>
                </tr>
            </form>
        </tbody>
    </table>

";


 




?>