/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Constructor for the Question
function Question(num,question,answers){
    
    var nArgs=arguments.length;
    if(nArgs===0||nArgs>3){
        this.num="";
        this.ques="";
    }else if(nArgs===3){
        this.num=num;
        this.ques=question;
        this.ans=answers;
    }else if(nArgs===2){
        this.num=num;
        this.ques=question;
    }else{
        this.num=num.num;
        this.ques=num.ques;
        this.ans=num.ans;
    }
};
//Setting the Category
Question.prototype.setCat=function(num){
    this.num=num;
};
//Setting the Question
Question.prototype.setQstn=function(question){
    this.ques=question;
};
//Adding an Answer
Question.prototype.addAns=function(answer){
    this.ans.push(answer);
};
//Accessing the Category
Question.prototype.getCat=function(){
    return this.num;
};
//Accessing the Question
Question.prototype.getQstn=function(){
    return this.ques;
};
//Accessing one of the Answers
Question.prototype.getAns=function(number){
    if(number>=0&&number<this.answers.length){
        return this.answers[number];
    }else{
        return "This is not a Question";
    }
};
//Displaying the Question
Question.prototype.display=function(){
    document.write("<p>"+this.ques+"</p>");
    for(var i=0;i<this.ans.length;i++){
        if(this.ans[i].length>0)
        document.write('<input type="radio" name='+this.num+" value="+this.ans+
                        ">"+this.ans[i]+"<br> </br>");
    }
};