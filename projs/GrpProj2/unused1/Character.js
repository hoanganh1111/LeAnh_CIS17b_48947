/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Character(name, str, int, dex, con, skl) {
    //Type of character's class
    this.name = name;
    
    //Four main attributes
    this.STR = str;
    this.INT = int;
    this.DEX = dex;
    this.CON = con;
    
    //Base Stats
    this.HP;
    this.MA;
    this.DEF;
    this.ATK;
    this.MATK;
    this.SPD;
    this.SIGHT;
    
    //Inventory and skill
    this.skills = [];
    this.skills = skl;
    //    this.inventory = [];
    //    this.equipment = [];
    
};


Character.prototype.baseStat = function(skl){
    
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.DEF   = 5 + (this.CON);
    this.ATK   = 1 + this.STR + this.DEX;
    this.MATK  = (1 + this.INT + this.DEX) * 2;
    this.SPD   = 5 + this.DEX;
    this.SIGHT = 3;
    
    if(this.name === "Mage"){
        this.skills.push("Fireball");
    }
    
    else if(this.name === "Fighter"){
        this.DEF *= 2;
    }
    else if(this.name === "Knight"){
        this.DEF *= 3;
    }

    else if(this.name === "Archer"){
        this.SIGHT += 1;
    }
};

Character.prototype.display = function(){
    document.write("<strong>Class</strong>: "+this.name+"<br/>");
    
    document.write("-------------Attributes------------"+"<br/>");
    document.write("Strength: "+this.STR+"<br/>"+
                   "Intellegence: "+this.INT+"<br/>"+
                   "Dexterity: "+this.DEX+"<br/>"+
                   "Constitution: "+this.CON+"<br/><br/>");
           
    document.write("-------------Stats------------"+"<br/>");
    document.write("Health: "+this.HP+"<br/>");
    document.write("Mana: "+this.MA+"<br/>");
    document.write("Defense: "+this.DEF+"<br/>");
    document.write("Attack: "+this.ATK+"<br/>");
    document.write("Magic Attack: "+this.MATK+"<br/>");
    document.write("Speed: "+this.SPD+"<br/>");
    document.write("Sight: "+this.SIGHT+"<br/><br/>");
    
    document.write("-------------Skills------------"+"<br/>");
    for(var n=0; n<this.skills.length; n++){
        document.write(this.skills[n]+"<br/>");
    }
    document.write("<br/><br/>");
};


