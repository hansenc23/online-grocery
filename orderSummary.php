<?php 

if(isset($_POST["checkout"])){
    if($_SESSION["shopping_cart"] == null){
        print "<script>alert('Cart is empty. Please add a product to the shopping cart')</script>";
    }
    else{
        print "
            <script>
                document.getElementById('product-info-table').style.display = 'none';
                document.getElementById('toggle').innerHTML = 'Order Summary';
                document.querySelector('.top-right-frame').style.height = '55vh';
                document.getElementById('top-right').style.justifyContent = 'flex-start';
            </script>
        ";

        print "<table id='summary-table' class='pure-table pure-table-bordered'>
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Unit Quantity</td>
                <td>Order Quantity</td>
                <td>Price</td>
            </tr>
        </thead>

        <tbody>";
            foreach($_SESSION["shopping_cart"] as $key => $value){
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
                </tr>
            ";
            }

            $total_price = 0;

            foreach($_SESSION["shopping_cart"] as $key => $value){
                $total_price += $value["quantity_needed"] * $value["unit_price"];
            }

            $formatted_total = number_format($total_price, 2);

        print "<tr>
        <td colspan='3' style='text-align: right;'><strong>TOTAL</strong></td>
        
       
        <td>$ $formatted_total</td>


       
    </tr>

    
</tbody>
</table>";
    }
  }




?>