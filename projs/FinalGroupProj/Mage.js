/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Mage(str, int, dex, con){
    
    this.name = "Mage";
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
    this.inventory = [["Health Potion", 1],
                      ["Mana Potion", 2],
                      ["Item1", 1],
                      ["Item2", 3]];
    
    //Equipment
    this.equipment = [[0,"Staff", 4],           
                      [1,"Hat", 1],
                      [2,"Robe", 3]];      
                  //Weapon-0
                  //Hat-1
                  //Chest-2
}

Mage.prototype.sentToServer = function(){
    var url = "updateCharacter.php?class_id=4&str=" + this.STR + "&int=" + this.INT + "&dex=" + this.DEX + "&con=" + this.CON + "&hp=" + this.HP + "&ma=" + this.MA + "&def=" + this.DEF + "&atk=" + this.ATK + "&matk=" + this.MATK + "&spd=" + this.SPD + "&sight=" + this.SIGHT + "&x_loc=1&y_loc=4" + "&inventory=" + this.inventory + "&level=" + this.LVL + "&exp=" + this.EXP;
    location.replace(url);
}

Mage.prototype.baseStat = function(){
    this.HP    = 10 + 2 * (this.CON);
    this.MA    = 5 + 2 * (this.INT);
    this.ATK   = 1 + 1*this.STR + 1*this.DEX + 1*this.equipment[0][2];
    this.DEF   = 5 + 1*(this.CON) + 1*this.equipment[1][2] + 1*this.equipment[2][2];
    this.MATK  = (1 + 1*this.INT + 1*this.DEX) * 2;
    this.SPD   = 5 + 1*this.DEX;
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

Mage.prototype.Weapon = function(weapon){
    for(var i=0; i< 3; i++){
          this.equipment[0][i] = weapon[0][i];
    }
};

Mage.prototype.Top = function(top){
    for(var i=0; i< 3; i++){
          this.equipment[1][i] = top[1][i];
    }
};

Mage.prototype.Chest = function(chest){
    for(var i=0; i< 3; i++){
          this.equipment[2][i] = chest[2][i];
    }
};

Mage.prototype.Inventory = function(item){
     this.inventory.push(item);
};

//Mage.prototype.display = function(){
//    document.write("Class: Mage"+"<br/>");      
//    document.write("Health: "+this.HP+"<br/>");
//    document.write("Mana: "+this.MA+"<br/>");
//    document.write("Defense: "+this.DEF+"<br/>");
//    document.write("Attack: "+this.ATK+"<br/>");
//    document.write("Magic Attack: "+this.MATK+"<br/>");
//    document.write("Speed: "+this.SPD+"<br/>");
//    document.write("Sight: "+this.SIGHT+"<br/><br/>");
//};
//
//Mage.prototype.display2 = function(){
//    document.write("-------------Skills------------"+"<br/>");
//    for(var n=0; n<this.skills.length; n++){
//        document.write(this.skills[n]+"<br/>");
//    }
//    document.write("Level: "+ this.LVL+"<br/>");
//    document.write("Experience: "+ this.EXP+"<br/>");
//};
//
//Mage.prototype.display3 = function(){
//    document.write("<br/>"+"-------------Equipment-------------" +"<br/>");
//    for(var n=0; n<3; n++){
//            document.write("Location: "+this.equipment[n][0]+"<br/>");
//        }
//     document.write("<br/>");
//        
//    for(var n=0; n<3; n++){
//            document.write("Type: "+this.equipment[n][1]+"<br/>");
//        }
//    document.write("<br/>");
//        
//    for(var n=0; n<3; n++){
//            document.write("Damage: "+this.equipment[n][2]+"<br/>");
//        }
//};
//
//Mage.prototype.display4 = function(){
//    document.write("<br/>"+"-------------Inventory-------------" +"<br/>");
//    for(var i=0; i<this.inventory.length; i++){
//        document.write("Item: "+this.inventory[i][0]+"<br/>");
//        document.write("Amount: "+this.inventory[i][1]+"<br/>"+"<br/>");
//    }
//};
