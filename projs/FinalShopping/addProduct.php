<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Adding a Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="ulStyle.css">
        <link rel="stylesheet" href="adminStyle.css">
    </head>
    <body>
        <ul class='topnav'>
                <li><a href="admin_main.php">Admin Main Page</a></li>
                <li><a href="admin_view.php">Display Survey Takers</a></li>
                <li><a href="TempProduct.php">Display Template </a></li>
                <li><a href="addProduct.php" onclick="delete_cookie()">Delete The User Cookies</a></li>
                <li style="float:right"><a class="active" onclick="delete_cookie_admin()" href="login.html">Log Out</a></li>
            </ul>
        
        <form action="getProduct.php" method="get" id="form">
                Product Name: 
                <br><input type="text" name="name" required><br><br>
                Description: 
                <br><textarea name="description" required></textarea><br><br>
                Price: 
                <br><input type="text" name="price" required><br><br>
                Image Location: 
                <br><input type="text" name="img" required><br><br>
                <br><input type="submit" name="submit">
            </form>
        
        <?php
        if(!isset($_COOKIE["adminEmail"])) {
            echo "<script type=\"text/javascript\"> alert('Admin Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        ?> 
        
        <script type="text/javascript">
            
            //************************************Admin Delete Cookies*******************************
            function delete_cookie() {
                document.cookie = "userEmail=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "userFirst=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "userLast=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "userId=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "total=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";

                alert("The user cookies has been deleted!");
            }
            
            function delete_cookie_admin() {
                document.cookie = "adminEmail=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "adminFirst=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";
                document.cookie = "adminLast=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=../../";

                alert("Goodbye Admin!");
            }
    </script>
    </body>
</html>
