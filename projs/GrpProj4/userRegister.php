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
        
        include 'connect_to_server.php';
        //include 'connect_to_server_local.php';
        
        $sql = "INSERT INTO user_entity(first_name, last_name, email, username, password) "
                . "VALUES('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['username']."','".$_POST['password']."')";

//        echo "back to the login.html";
        
        if ($conn->query($sql) === TRUE) {
            echo "You have sucessfully registered";
            echo "<script type=\"text/javascript\"> window.location.replace('Login.html')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        ?>
    </body>
</html>
