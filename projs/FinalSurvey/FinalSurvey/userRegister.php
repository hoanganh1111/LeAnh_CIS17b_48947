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
        
        include '../connect_to_server.php';
        //include 'LOCAL.php';
        
        $sql = "INSERT INTO entity_survey_user(first_name, last_name, email, password) "
                . "VALUES('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['password']."')";

//        echo "back to the login.html";
        
        if ($conn->query($sql) === TRUE) {
            echo "You have sucessfully registered";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
       
        $conn->close();
        ?>
    </body>
</html>
