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
        include '../../connect_to_server.php'; //Connect to the database
        $sql = "SELECT `id_shop_user`, `first_name`, `last_name`, `email_address`, `password` FROM `ale_48947`.`entity_shop_user` AS `entity_shop_user`";
        
        $result = $conn->query($sql);
               
        $userFirst;
        $userLast;
        $userEmail; 
        
        //If loged in is false
        $logedin = false;
                
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(strtolower($_POST["email"]) === strtolower($row["email_address"]) 
                        && $_POST["password"] === $row["password"]){
                    
                    $userId = $row["id_shop_user"];
                    $userFirst = $row["first_name"];
                    $userLast = $row["last_name"];
                    $userEmail = $row["email_address"];
                    
                    //Set the user's cookies
                    setcookie('userId', $userId);
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
              
        //If the user is not logged in
        if(!$logedin){
            echo "<script type=\"text/javascript\"> alert('Invalid email or password!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        $conn->close();
        ?>
        
    </body>
</html>
