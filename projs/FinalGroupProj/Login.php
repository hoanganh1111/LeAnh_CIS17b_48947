<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>D&D Log In</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="LoginStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="newStyle.css">
    </head>
    <body>
        <div class="header">
            <img src="other_img/logo.png" width="50%" id="logo">
        </div>
        
        <div class="main">
            <div class="bottom"></div>
            <div class="login"> 
                <img src ="other_img/avatar.png" class="avatar">
                <form action="userLogin.php" method="post">
                    <p>Email</p>
                    <input type="text" id="fromInput" name="email" placeholder="Enter Email" 
                           pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Invalid Email" required>
                    <p>Password</p>
                    <input type="password" id="fromInput" name="password" placeholder="Enter Password" 
                           pattern="^[a-zA-Z0-9].{8,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <input type="submit" id="submitBtn" value="Sign in">
                    <a id="register" onclick="displayRegister()">Register Now!</a>
                    <br>
                    <a href="#">Can't Log In?</a>
                </form>
            </div>
        </div>
        
        <div id="bigCont">
                <div id="registerCont">
                    <a onclick="hideRegister()" id="close">X</a>
                    <h1>New Account</h1>
                    <form action="userRegister.php" method="post">
                        <p>First Name</p>
                        <input type="text" id="fromInput" name="firstname" placeholder="Enter First Name" required>
                        <p>Last Name</p>
                        <input type="text" id="fromInput" name="lastname" placeholder="Enter Last Name" required>
                        <p>Username</p>
                        <input type="text" id="fromInput" name="username" placeholder="Enter Username" required>
                        <p>Email</p>
                        <input type="text" id="fromInput" name="email" placeholder="Enter Email" 
                               pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Invalid Email" required>
                        <p>Password</p>
                        <input type="password" id="fromInput" name="password" placeholder="Enter Password" 
                               pattern="^[a-zA-Z0-9].{8,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <p>Repeat Password</p>
                        <input type="password" id="fromInput" name="password" placeholder="Enter Password" 
                               pattern="^[a-zA-Z0-9].{8,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <input type="submit" id="submitBtn" value="Register">
                    </form>
                </div>
            </div>
        
        <a id="admin" onclick="displayAdmin()">admin</a>
        
        <div id="AdminBigCont">
                <div id="AdminCont">
                    <a onclick="hideAdmin()" id="adminclose">X</a>
                    <h1>Are You Admin?</h1>
                    <form action="adminLogin.php" method="post">
                        <p>Email</p>
                        <input type="text" id="fromInput" name="email" placeholder="Enter Email" 
                               pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Invalid Email" required>
                        <p>Password</p>
                        <input type="password" id="fromInput" name="password" placeholder="Enter Password" title="Invalid Passowrd" required>
                        <input type="submit" id="submitBtn" value="Admin Log In">
                    </form>
                </div>
            </div>
        <script type="text/javascript">
            
            function displayRegister(){
                document.getElementById("bigCont").style.display = "block";
            }
            
            function hideRegister(){
                document.getElementById("bigCont").style.display = "none";
            }
            
            function displayAdmin(){
                document.getElementById("AdminBigCont").style.display = "block";
            }
            
            function hideAdmin(){
                document.getElementById("AdminBigCont").style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == AdminBigCont) {
                    AdminBigCont.style.display = "none";
                }
            }
        </script>
        
        <?php
        
        if(isset($_COOKIE["user_id"])){
            echo "<script type=\"text/javascript\"> window.location.replace('character_creation.html')</script>";
        }
        
        ?>
    </body>
</html>
