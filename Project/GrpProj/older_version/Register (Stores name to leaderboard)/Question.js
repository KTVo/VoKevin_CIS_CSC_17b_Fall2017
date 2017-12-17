/*
 * Author:      Dr. Mark E. Lehr
 * Date  :      Oct 6th, 2017
 * Purpose:     Question class
 */

//Constructor for the Question
function Question(category,question){
    //How many arguments are provided
    var nArgs=arguments.length;//The number of arguments passed to the function
    if(nArgs==0||nArgs>3){//Empty Question
        this.cat="aaa";
        this.qstn="bbb";
    }else if(nArgs==2){//Question provided with no answers added latter
        this.cat=category;
        this.qstn=question;
    }else{

    }
};
//Setting the Category
Question.prototype.setCat=function(category){
    this.cat=category;
};
//Setting the Question
Question.prototype.setQstn=function(question){
    this.qstn=question;
};
//Adding an Answer
Question.prototype.addAns=function(answer){
    this.ans.push(answer);
};
//Accessing the Category
Question.prototype.getCat=function(){
    return this.cat;
};
//Accessing the Question
Question.prototype.getQstn=function(){
    return this.qstn;
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
	document.write("<p>"+this.cat+"</p>");
    document.write("<p>"+this.qstn+"</p>");

        //document.write('<input type="radio" name='+this.cat+ "<br> </br>");
   
};