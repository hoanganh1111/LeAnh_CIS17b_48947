<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout Time!</title>
        <link rel="stylesheet" href="navStyle.css">
    </head>
    <body>
        
         <div class="nav">
      <ul>
        <li class="home"><a href="main.php">Home</a></li>
        <li class="cart"><a href="viewCart.php">Cart</a></li>
        <li class="checkout"><a href="checkout.php">Checkout</a></li>
        <li class="logout"><a href="login.html">Log Out</a></li>
      </ul>
    </div>
        
        <div id="total"></div>
        
        <form action="getPaid.php" method="get" id="form">
                
                <h3>Personal Informations!</h3>
                First Name: 
                <br><input type="text" name="first" required><br><br>
                Last Name: 
                <br><input type="text" name="last" required><br><br>
                Address Number: 
                <br><input type="text" name="addNum" required><br><br>
                Street: 
                <br><input type="text" name="street" required><br><br>
                State: 
                <br><input type="text" name="state" required><br><br>
                Zip-code: 
                <br><input type="text" name="zip" required><br><br>
                
                <h3>Payment Info!</h3>
                Card number: 
                <br><input type="text" name="cardNum" required><br><br>
                Expiration date: 
                <br><input type="text" name="exp" required><br><br>
                CVG Code: 
                <br><input type="text" name="cvg" required><br><br>
                
                <br><input type="submit" name="submit">
            </form>
        
        <?php
        if(!isset($_COOKIE["userEmail"])) {
            echo "<script type=\"text/javascript\"> alert('User Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        $total = $_COOKIE["total"];
        //echo "<script type=\"text/javascript\"> document.getElementById('total').innerHTML += $'.$total.'</script>";
        echo "\nTOTAL = $".$total;
        ?>
    </body>
</html>
