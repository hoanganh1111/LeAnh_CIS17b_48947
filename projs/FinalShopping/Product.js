/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

///************************************Item Product Function*******************************
function Product(id, name, desc, pri, pic)
{
    
    this.id= id;
    this.name= name;
    this.description= desc;
    this.price= pri;
    this.picture= pic;
    
}

//Display the Products function
Product.prototype.displayProduct=function(){
    //Set the img to the localtion/img
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    //set a variable to the pop function in main.php. Parse in the varibles into the function
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
    //Output the products
    document.getElementById("main").innerHTML += 
            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='300' height='400'>\n\
                <p>"+this.name+"<br>$"+this.price+"</p></li>";
    
};


Product.prototype.displayCart=function(){
    //Set the img to the localtion/img
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    //set a variable to the pop function in main.php. Parse in the varibles into the function
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
    //Output the products
    document.getElementById("main").innerHTML += 
            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='75' height='100'>\n\
                <p>"+this.name+"<br>$"+this.price+"</p></li>";
};

Product.prototype.displayTemp=function(){
    //Set the img to the localtion/img
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    //set a variable to the pop function in main.php. Parse in the varibles into the function
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
    //Output the products
    document.getElementById("main").innerHTML += 
            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='75' height='100'>\n\
                <p>"+this.name+"<br>$"+this.price+"</p></li>";
};


//************************************Item Cart Function*******************************
function Cart(id, name, desc, pri, pic, quan)
{
    
    this.id= id;
    this.name= name;
    this.description= desc;
    this.price= pri;
    this.picture= pic;
    this.quantity = quan;
    
}

Cart.prototype.displayCart=function(){
    //Set the img to the localtion/img
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    //set a variable to the pop function in main.php. Parse in the varibles into the function
    var popup = "showpopup('"+this.id+"','"+this.name+"','"+this.description+"','"+this.price+"','"+this.picture+"')";
    
    //Output the products as object into <div>
    document.getElementById("shopping-cart").innerHTML += '<div id = "item">\n\
                                                                <div id="image"><img onclick="'+popup+'" src="'+this.picture+'" width="75" height="100"></div>\n\
                                                                <div id="itemName"><p>'+this.name+'</p></div>\n\
                                                                <div id="quantity"><p>Quantity: '+this.quantity+'</p></div>\n\
                                                                <div id="price"><p>Price(each): $'+this.price+'</p></div></div>';
};