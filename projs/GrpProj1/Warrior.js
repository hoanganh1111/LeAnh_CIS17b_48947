/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Warrior(str, int, dex, con){
    
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
    
    this.inventory = [];
    this.equipment = [[],[]];
       
}

Warrior.prototype.baseStat = function(skl){
    
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.DEF   = 5 + (this.CON);
    this.ATK   = 1 + this.STR + this.DEX;
    this.MATK  = (1 + this.INT + this.DEX) * 2;
    this.SPD   = 5 + this.DEX;
    this.SIGHT = 3;
};

Warrior.prototype.levelup = function(){
    
}
