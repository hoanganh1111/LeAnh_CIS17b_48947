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
        //Coonect to database
        include 'connect_to_server.php';
        $sql = "SELECT `first_name`, `last_name`, `email`, `username`, `password` FROM `DnD_48947`.`user_entity` AS `user_entity`";
        
//        include 'connect_to_server_local.php';
//        $sql = "SELECT `first_name`, `last_name`, `email`, `username`, `password` FROM `DnD`.`user_entity` AS `user_entity`";
//        
        $result = $conn->query($sql);
        
        $first;
        $last;
        $email; 
        $username;
        $logedin = false;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(strtolower($_POST["email"]) === strtolower($row["email"]) 
                        && $_POST["password"] === $row["password"]){
                    
                    $first = $row["first_name"];
                    $last = $row["last_name"];
                    $email = $row["email"];
                    $username = $row["username"];
                    
                    setcookie('first', $first);
                    setcookie('last', $last);
                    setcookie('email',$email);
                    setcookie('username',$username);
                    
                    //Store these variables into local storage or cookies
                    echo "<script type=\"text/javascript\"> window.location.replace('main.php')</script>";
                    
                    $logedin = true;
                    }
                }
            }else {
            echo "0 results";
        }
        
        if(!$logedin){
            echo "<script type=\"text/javascript\"> alert('Invalid username or password')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('Login.html')</script>";
        }
       
        $conn->close();
        ?>
    </body>
</html>
