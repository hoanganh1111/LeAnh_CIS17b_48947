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
        include '../../connect_to_server.php';
        $sql = "SELECT `first_name`, `last_name`, `email_address`, `password` FROM `ale_48947`.`entity_admin` AS `entity_admin`";
        
        $result = $conn->query($sql);
               
        $adminFirst;
        $adminLast;
        $adminEmail;
        
        //if Admin it's not logged in
        $logedin = false;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if(strtolower($_POST["email"]) === strtolower($row["email_address"]) 
                        && $_POST["password"] === $row["password"]){
                    
                    $adminFirst = $row["first_name"];
                    $adminLast = $row["last_name"];
                    $adminEmail = $row["email_address"];
                    
                    //Setting the Admin's cookies
                    setcookie('adminFirst', $adminFirst);
                    setcookie('adminLast', $adminLast);
                    setcookie('adminEmail',$adminEmail);
                    
                    //Store these variables into local storage or cookies
                    echo "<script type=\"text/javascript\"> window.location.replace('admin_main.php')</script>";
                    
                    //Admin is logged in
                    $logedin = true;
                    }
                }
            }else {
            echo "0 results";
        }
        
        //if Admin is not log in
        if(!$logedin){
            //redirect to login.html
            echo "<script type=\"text/javascript\"> alert('You are not admin!')</script>";
            echo "<script type=\"text/javascript\"> window.location.replace('login.html')</script>";
        }
        
        $conn->close();
        
        ?>
    </body>
</html>
