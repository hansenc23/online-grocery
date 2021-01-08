<?php 

if(isset($_POST["checkout"])){
    if($_SESSION["shopping_cart"] == null){
        print "<script>alert('Cart is empty. Please add a product to the shopping cart')</script>";
    }
    else{
        print "
            <script>
                document.getElementById('cart-table').style.display = 'none';
                document.getElementById('toggle1').innerHTML = 'Purchase Form';
                document.querySelector('.bottom-right-frame').style.height = '45vh';
                document.getElementById('bottom-right').style.textAlign = 'justify';
            </script>
        ";

        print "
        
        <form action='index.php' method='post' id='purchase-form' class='pure-form pure-form-stacked'>
        <fieldset>
            <legend>Details</legend>
            <div class='pure-g'>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='name'>Name<span class='asterisk'>*</span></label>
                    <input type='text' name='name' id='name' class='pure-u-23-24' required/>
                </div>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='address'>Address<span class='asterisk'>*</span></label>
                    <input type='text' name='address' id='address' class='pure-u-23-24' required/>
                </div>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='suburb'>Suburb<span class='asterisk'>*</span></label>
                    <input type='text' name='suburb' id='suburb' class='pure-u-23-24' required/>
                </div>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='state'>State<span class='asterisk'>*</span></label>
                    <input type='text' name='state' id='state' class='pure-u-23-24' required/>
                </div>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='country'>Country<span class='asterisk'>*</span></label>
                    <input type='text' name='country' id='country' class='pure-u-23-24' required/>
                </div>
                <div class='pure-u-1 pure-u-md-1-3'>
                    <label for='email'>Email<span class='asterisk'>*</span></label>
                    <input type='email' name= 'email' id='email' class='pure-u-23-24' required/>
                </div>
            </div>
            <div id='purchase-btn'>
                <button type='submit' name='submit_purchase' class='pure-button pure-button-primary'>Submit</button>
                <a name='cancel_purchase' id='cancel-purchase' class='pure-button' href='?purchase=cancel'>Cancel</a>
            </div>  
            
        </fieldset>
        </form>
        
        
        
        
        ";
    }
  }




?>