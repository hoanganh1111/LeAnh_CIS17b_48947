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
                <style>
body{
    background-color: #DCDCDC;
}
h1 {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
ul.products li {
    width: 200;
    height: 100;
    display: inline-block;
    vertical-align: top;
    *display: inline;
    *zoom: 1;
}
</style>
    </head>
    
    <body>
        <h1>Super Hero Posters</h1>
        <ul class="products">
    <li>
        <a href="#">
            <img src="Products/Batman2.jpg">
            <h4>Batman</h4>
            <p>$15.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Captain.jpg">
            <h4>Captain America</h4>
            <p>$20.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Flash2.jpg">
            <h4>The Flash</h4>
            <p>$20.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Ironman.jpg">
            <h4>Ironman</h4>
            <p>$10.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Wonderwoman.jpg">
            <h4>Wonder Woman</h4>
            <p>$30.00</p>
        </a>
    </li>
     <li>
        <a href="#">
            <img src="Products/Greenlatern.jpg">
            <h4>Green Lantern</h4>
            <p>$25.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Thor.jpg">
            <h4>Thor</h4>
            <p>$20.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Joker.jpg">
            <h4>The Joker</h4>
            <p>$35.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Wolverine.jpg">
            <h4>Wolverine</h4>
            <p>$25.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Greenlatern2.jpg">
            <h4>Greenlantern 2</h4>
            <p>$25.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Hulk.jpg">
            <h4>Hulk</h4>
            <p>$20.00</p>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="Products/Wonderwoman2.jpg">
            <h4>Wonder Woman 2</h4>
            <p>$15.00</p>
        </a>
    </li>
</ul>
        
        <?php
        //Retrieve the info from local storage or cookies
        if(isset($_COOKIE['userEmail'])){
            $userEmail = $_COOKIE['userEmail'];
        }
        if(isset($_COOKIE['userFirst'])){
            $userFirst = $_COOKIE['userFirst'];
        }
        if(isset($_COOKIE['userLast'])){
            $userLast = $_COOKIE['userLast'];
        }
        if(isset($_COOKIE['userPass'])){
            $userPass = $_COOKIE['userPass'];
        }
        ?>
            
    </body>
</html>
