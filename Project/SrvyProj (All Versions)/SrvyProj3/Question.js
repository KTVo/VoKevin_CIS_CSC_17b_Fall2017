/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Question(category,question,answers){
    var nArgs = arguments.length;
    if(nArgs === 0 || nArgs >3){
        this.cat="";
        this.qstn="";
    }else if(nArgs === 3){
        this.cat = category;
        this.qstn = question;
        this.ans = answers;
    }else if(nArgs === 2){
        this.cat = category;
        this.qstn = question;
    }else{
        this.cat = category.cat;
        this.qstn = category.qstn;
        this.ans = category.ans;
    }
};

Question.prototype.setCat = function(category){
    this.cat = category;
};

Question.prototype.setQstn = function(question){
    this.qstn = question;
};

Question.prototype.addAns = function(answer){
    this.ans.push(answer);
};

Question.prototype.getCat=function(){
    return this.cat;
};

Question.prototype.getQstn = function(){
    return this.qstn;
};

Question.prototype.getAns=function(number){
    if(number >= 0 && number < this.answers.length){
        return this.answers[number];
    }else{
        return "This is not a Question";
    }
};

Question.prototype.display = function(){

    document.write("<div class='questions' style = 'border: dotted 1px grey'")
    document.write("<p>"+ this.cat + ": " + this.qstn + "</p>");   //
    for(var i = 0; i < this.ans.length; i++){
        if(this.ans[i].length>0){
            document.write('<p><input type ="radio" name="' +this.cat+ '" value="' + this.ans[i]+'">'+this.ans[i]+"</p>");
        }
    }

    document.write("</div>")

};

