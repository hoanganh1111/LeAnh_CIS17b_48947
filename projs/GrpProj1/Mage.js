/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Mage(str, int, dex, con){
    
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
    
    this.LVL=1;
    this.EXP = 0;
    
    //Skills and Spell
    this.skills = ["Nothing"];
    this.spellCheck = [[2,"Frostbite"],
                       [3,"Fireball"],
                       [5,"Ice Storm"],
                       [7,"Orb of Chaos"]];
               
    this.expReq= [85, 75, 65, 40, 25, 10];
    
     //Inventory
    //this.inventory = [];
    
    //Equipment
    //this.equipment = [[],[]];
    
}

Mage.prototype.baseStat = function(){
    
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.DEF   = 5 + (this.CON);
    this.ATK   = 1 + this.STR + this.DEX;
    this.MATK  = (1 + this.INT + this.DEX) * 2;
    this.SPD   = 5 + this.DEX;
    this.SIGHT = 3;
};

Mage.prototype.LevelStat = function(str, int, dex, con){
    this.STR += str;
    this.INT += int;
    this.DEX += dex;
    this.CON += con;
    
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.DEF   = 5 + (this.CON);
    this.ATK   = 1 + this.STR + this.DEX;
    this.MATK  = (1 + this.INT + this.DEX) * 2;
    this.SPD   = 5 + this.DEX;
    this.SIGHT = 3;
};

Mage.prototype.LevelSkill = function(exp){
  
    for(var i=0; i<this.expReq.length; i++){
        if(exp >= this.expReq[i]){
            this.LVL++;
            this.EXP = (exp-this.expReq[i]);
            this.expReq.splice(i,1);
        }
    }

    for(var n=0; n<this.spellCheck.length; n++){
        if(this.LVL === this.spellCheck[n][0]){
            this.skills.push(this.spellCheck[n][1]);
            this.spellCheck.splice(n,1);
        }
    }
};

Mage.prototype.display = function(){
    
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
};

Mage.prototype.display2 = function(){
    document.write("-------------Skills------------"+"<br/>");
    for(var n=0; n<this.skills.length; n++){
        document.write(this.skills[n]+"<br/>");
    }
    document.write("Level: "+ this.LVL+"<br/>");
    document.write("Experience: "+ this.EXP+"<br/>");
};