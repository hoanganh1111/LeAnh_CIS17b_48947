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
        include 'connect_to_server.php'; //Connect to the database
        $sql = "SELECT `first_name`, `last_name`, `email_address`, `password` FROM `ale_48947`.`entity_shop_user` AS `entity_shop_user`";
        
        //LOCAL
//        include 'LOCAL.php';
//        $sql = "SELECT `first_name`, `last_name`, `email_address`, `password` FROM `test`.`entity_shop_user` AS `entity_shop_user`";
        
        $result = $conn->query($sql);
               
        $userFirst;
        $userLast;
        $userEmail; 
        
        $logedin = false;
                
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(strtolower($_POST["email"]) === strtolower($row["email_address"]) 
                        && $_POST["password"] === $row["password"]){
                    
                    $userFirst = $row["first_name"];
                    $userLast = $row["last_name"];
                    $userEmail = $row["email_address"];
                    
                    setcookie('userFirst', $userFirst);
                    setcookie('userLast', $userLast);
                    setcookie('userEmail',$userEmail);
                    
                    //Store these variables into local storage or cookies
                    echo "<script type=\"text/javascript\"> window.location.replace('main.php')</script>";
                    
                    $logedin = true;
                    }
                }
            }else {
            echo "0 results";
        }
        
        if(!$logedin){
            echo "<script type=\"text/javascript\"> alert('Invalid email or password!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('Login.html')</script>";
        }
        
        $conn->close();
        ?>
        
    </body>
</html>
