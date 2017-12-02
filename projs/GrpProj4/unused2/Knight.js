/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Knight(str, int, dex, con){
    
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
    this.spellCheck = [[2,"Spell1"],
                       [3,"Spell2"],
                       [5,"Spell3"],
                       [7,"Spell4"]];
               
    this.expReq= [85, 75, 65, 40, 25, 10];
    
     //Inventory
    this.inventory = [];
    
    //Equipment
    this.equipment = [[0,"Weapon", 4],           
                      [1,"Top", 1],
                      [2,"Chest", 3]];      
                  //Weapon-0
                  //Hat-1
                  //Chest-2
}

Knight.prototype.baseStat = function(){
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.ATK   = 1 + this.STR + this.DEX + this.equipment[0][2];
    this.DEF   = 5 + (this.CON) + this.equipment[1][2] + this.equipment[2][2];
    this.MATK  = (1 + this.INT + this.DEX) * 2;
    this.SPD   = 5 + this.DEX;
    this.SIGHT = 3;
};

Knight.prototype.LevelStat = function(str, int, dex, con){
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

Knight.prototype.LevelSkill = function(exp){
  
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