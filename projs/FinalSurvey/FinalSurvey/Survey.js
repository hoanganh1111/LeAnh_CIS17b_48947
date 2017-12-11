/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Survey(name, description, questions, numOfPpl)
{
    var nArgs = arguments.length;
    if(nArgs==0||nArgs>4){
        this.name="";
        this.description="";
        this.questions=[];
        this.numOfPpl=0;
    }else if(nArgs==4){
        this.name=name;
        this.description=description;
        this.questions=questions;
        this.numOfPpl=0;
    }else if(nArgs==3){
        this.name=name;
        this.description=description;
        this.questions=questions;
        this.numOfPpl=0;
    }else if(nArgs==2){
        this.name=name;
        this.description=description;
        this.questions=[];
        this.numOfPpl=0;
    }else{
        this.name=name.name;
        this.description=name.description;
        this.questions=name.questions;
        this.numOfPpl=name.numOfPpl;
    }
}

// return the name of the creator
Survey.prototype.getName=function()
{
    return this.name;
};

// return the description
Survey.prototype.getDescription=function()
{
    return this.description;
};

// add a question
Survey.prototype.addQuestion=function(identifier, question, answers)
{
    // initiate the result array
    var resultArr = [0,0,0,0,0];
    for(var i = 0; i < answers.length; i++){
        resultArr[i]=0;
    }
    
    // create an temp question object and push it into the list of questions
    var newQuestion = new Question(identifier, question, answers, resultArr);
    this.questions.push(newQuestion);
};

//Reconstruct the Survey object from local after it has been added new question
Survey.prototype.reconstSurvey=function()
{
    //Retrieve survey from storage
    var str=localStorage.getItem("survey");
    //Parse the string into the object
    var obj=JSON.parse(str);
    var surveyComp = [];
    for(property in obj){
        surveyComp.push(obj[property]);
    }
    this.name = surveyComp[0];
    this.description = surveyComp[1];
    this.questions = surveyComp[2];
    this.numOfPpl = surveyComp[3];
};

// display the questions for survey
Survey.prototype.displaySurvey=function()
{
    document.getElementById("survey_name").innerHTML += this.name;
    document.getElementById("description").innerHTML += this.description;
    document.getElementById("main").innerHTML+="<hr>";

    document.getElementById("main").innerHTML+='<form action="getForm.html" method="get" id="form"></form>';
    for(var i = 0; i < this.questions.length; i++){
        var curQuest = this.questions[i];
        document.getElementById("form").innerHTML+="<h4>"+curQuest.ident+". "+curQuest.quest+"</h4>";

        for(var j=0;j<curQuest.ans.length;j++){
            document.getElementById("form").innerHTML+='<input type="radio" name='+curQuest.ident+" value='"+curQuest.ans[j]+"' required>"+curQuest.ans[j]+"<br><br>";
        }
        document.getElementById("form").innerHTML+="<hr>";
    }
    document.getElementById("form").innerHTML+='<input type="submit" name="submit">';
};

//display the questions with the results
Survey.prototype.displayResult=function()
{
    // Display total number of people who took the survey
    document.getElementById("main").innerHTML+="<p>Total of "+this.numOfPpl+" people have taken this survey!</p>";

    // Display the result of the survey
    for(var i = 0; i < this.questions.length; i++){
        var curQuest = this.questions[i];
        document.getElementById("main").innerHTML+="<hr><h4>"+curQuest.ident+". "+curQuest.quest+"</h4>";

        for(var j=0;j<curQuest.ans.length;j++){
            document.getElementById("main").innerHTML+= curQuest.result[j] + " - " + curQuest.ans[j] + "<br><br>";
        }
    }
};

//Display template survey
Survey.prototype.displayTemplate=function()
{
    // Display the result of the survey
    for(var i = 0; i < this.questions.length; i++){
        var curQuest = this.questions[i];
        document.getElementById("main").innerHTML+="<hr><h4>"+curQuest.ident+". "+curQuest.quest+"</h4>";

        for(var j=0;j<curQuest.ans.length;j++){
            document.getElementById("main").innerHTML+= curQuest.ans[j] + "<br><br>";
        }
    }
};