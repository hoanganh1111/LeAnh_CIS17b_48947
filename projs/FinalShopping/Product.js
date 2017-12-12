/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Product(id, name, desc, pri, pic)
{
    
    this.id= id;
    this.name= name;
    this.description= desc;
    this.price= pri;
    this.picture= pic;
    
}

Product.prototype.displayProduct=function(){
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
    document.getElementById("main").innerHTML += 
            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='300' height='400'>\n\
                <p>"+this.name+"<br>$"+this.price+"</p></li>";
    
};

Product.prototype.displayCart=function(){
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
    document.getElementById("main").innerHTML += 
            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='75' height='100'>\n\
                <p>"+this.name+"<br>$"+this.price+"</p></li>";
};

Product.prototype.displayTemp=function(){
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    
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
    var img_src = "Products/";
    this.picture = img_src + this.picture;
    
    //var popup = 'showpopup("'+this.id+'","'+this.name+'","'+this.description+'","'+this.price+'","'+this.picture+'")';
    var popup = "showpopup('"+this.id+"','"+this.name+"','"+this.description+"','"+this.price+"','"+this.picture+"')";
    
    document.getElementById("main").innerHTML += '<li><img onclick="'+popup+'" src="'+this.picture+'" width="75" height="100">\n\<p>'+this.name+'<br>$'+this.price+'<br>Quantity: '+this.quantity+'</p></li>';
//    document.getElementById("main").innerHTML += 
//            "<li><img onclick='"+popup+"' src='"+this.picture+"' width='75' height='100'>\n\
//                <p>"+this.name+"<br>$"+this.price+"<br>Quantity: "+this.quantity+"</p></li>";
};