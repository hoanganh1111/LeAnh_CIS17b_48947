<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        if(!isset($_COOKIE["adminEmail"])) {
            echo "<script type=\"text/javascript\"> alert('Admin Login Fail!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        include '../../connect_to_server.php';
        
        //Delete the Product under Admin Page
        $sql ="DELETE FROM enum_product WHERE id_product='".$_GET['id']."' ";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script type=\"text/javascript\"> alert('Product removed!')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo "<script type=\"text/javascript\"> window.location.replace('TempProduct.php')</script>";
        
        $conn->close();
        ?>
    </body>
</html>
