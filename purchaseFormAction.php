<?php 

function printTable(){
    foreach($_SESSION["shopping_cart"] as $key => $value){
        $product_name = $value["product_name"];
        $unit_quantity = $value["unit_quantity"];
        $quantity_needed = $value["quantity_needed"];
        $price = number_format($value["unit_price"] * $quantity_needed, 2);

        return 
        '<tr>' .
            '<td>' . $product_name . '</td>' .
            '<td>' . $unit_quantity . '</td>' .
            '<td>' . $quantity_needed . '</td>' .
            '<td>' . '$' . $price . '</td> ' .
        '</tr>' . '';
    } 
  }

if(isset($_POST["submit_purchase"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $suburb = $_POST["suburb"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $email = $_POST["email"];

    

        $to = $email; // note the comma

        // Subject
        $subject = 'Order Details';

        
    
        // Message
        $message = '
        <html>
        <head>
          <title></title>
        </head>
        <body>
         '. '<h3>Hi ' . $name . ', your order was successful, please find the attached invoice below:</h3>' . '
        <table border="1">
        <tr>
            <td><strong>Product Name</strong></td>
            <td><strong>Unit Quantity</strong></td>
            <td><strong>Order Quantity</strong></td>
            <td><strong>Price</strong></td>
        </tr>
      
        ';

       
         foreach ($_SESSION["shopping_cart"] as $key => $value){
            $product_name = $value["product_name"];
            $unit_quantity = $value["unit_quantity"];
            $quantity_needed = $value["quantity_needed"];
            $price = number_format($value["unit_price"] * $quantity_needed, 2);

         $message.= '<tr><td>'.$product_name.'</td><td>'.$unit_quantity.'</td><td>'.$quantity_needed.'</td><td>$ '.$price.'</td></tr>';
        
        }

        $total_price = 0;

            foreach($_SESSION["shopping_cart"] as $key => $value){
                $total_price += $value["quantity_needed"] * $value["unit_price"];
            }

            $formatted_total = number_format($total_price, 2);

            $message.= '<tr>
            <td colspan="3"><strong>TOTAL</strong></td>' . '<td>$'. $formatted_total. '</td>';

        $message.='</table>';
        $message.='<h5>Order destination: </h5>';
        $message.= '<p>Address: ' . $address . '</p>'; 
        $message.= '<p>Suburb: ' . $suburb . '</p>'; 
        $message.= '<p>State: ' . $state . '</p>'; 
        $message.= '<p>State: ' . $country . '</p>'; 
        $message.= '</body>
        </html>';

        
    
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
        // Additional headers
        $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
        $headers[] = 'From: POTI Online Grocery <potigrocery@poti.com>';
    
        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));

        unset($_SESSION["shopping_cart"]);
        unset($_SESSION["active_product"]);

        print "
            <script>
                document.getElementById('product-info-table').style.display = 'none';
                document.getElementById('toggle').innerHTML = 'Order Summary';
                document.querySelector('.top-right-frame').style.height = '55vh';
                document.getElementById('top-right').style.justifyContent = 'flex-start';
                document.getElementById('cart-table').style.display = 'none';
                document.getElementById('toggle1').innerHTML = 'Purchase Successful!';
                document.querySelector('.bottom-right-frame').style.height = '45vh';
                document.getElementById('bottom-right').style.textAlign = 'justify';
            </script>
        ";

        print "
            <form action='index.php' method='post'>
                <div id='success-message'>
                    <p>Order invoice has been successfully sent to <strong>$email</strong>  </p>
                    <button type='submit' name='home' class='pure-button pure-button-primary'>Home</button>
                </div>
            </form>

        ";

      
        
  }

 



?>