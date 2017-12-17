/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function SurveyResult(q_id, descr, ans) {

}

var surveyResults = [];
var allUsers = [];
var curIndex = 0;

//store the survey results to localstorage, for submit button
resultFunction = function () {
    var username = document.getElementsByName("userInput")[0].value;
    var len = localStorage.getItem("len");
    alert("len = " + len);
    for (var i = 0; i < len; i++) {
        var temp = localStorage.getItem(i);
        var question = new Question(JSON.parse(temp));
        var j = i + 1;
        var sel = document.querySelector('input[name="' + question.cat + '"]:checked');
        surveyResults[i] = new SurveyResult("question " + j, question.qstn, sel.value);
    }
    var res = JSON.stringify(surveyResults);
    localStorage.setItem(username, res);
    allUsers[curIndex++] = username;
};


//function for clear button
clearFunction = function () {

    var x = document.getElementsByTagName("input");
    for (var i = 0; i < x.length; i++) {
        if (x[i].type === "radio") {
            x[i].checked = false;
        } else if (x[i].type === "text") {
            x[i].value = "";
        }
    }
};




function displayResults() {

    document.write("All survey results are displayed below: </br>");

    for (var userId = 0; userId < allUsers.length; userId++) {
        var res = JSON.parse(localStorage.getItem(allUsers[userId]));
        document.write("The survey result for username " + allUsers[userId] + " is: </br>");

        for (numQue in res) {
            for (property in res[numQue]) {
                document.write(res[numQue][property] + "</br>");
            }
        }
        document.write("</br>");
    }

}

