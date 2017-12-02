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
        //include 'connect_to_server.php';
        //$sql = "SELECT blah blah blah";
        
        include 'connect_to_server_local.php';
        $sql = "SELECT `first_name`, `last_name`, `email`, `username`, `password` FROM `DnD`.`user_entity` AS `user_entity`";
        
        $result = $conn->query($sql);
        
        $first;
        $last;
        $email; 
        $username;
        
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
                    echo "<script type=\"text/javascript\"> window.location.replace('main.html')</script>";
                    }
                    else {
                        echo "<script type=\"text/javascript\"> window.location.replace('Login.html')</script>";
                    }
                }
            }else {
            echo "0 results";
        }
       
        $conn->close();
        ?>
    </body>
</html>
