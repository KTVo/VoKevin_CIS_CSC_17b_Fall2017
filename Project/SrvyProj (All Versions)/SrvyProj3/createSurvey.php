<!DOCTYPE html>
<html>
<head>
	<title>Create Survery</title>
	<script type="text/javascript" src="Question.js" ></script>
    <script type="text/javascript" src="getForm.js"></script>
    <script type="text/javascript" src="cookieFunction.js"></script>

</head>

<body>
<a href="logout.php"><p align = "right", style="font-size : 30px";">Logout</p></a>
<br/><br/>

<h1><center>Create Survey</center></h1>

<p>Title: <input id="title" type="text" /></p>

 <form action = "createSurvey.php" method ="get">
            <label>Enter Number for Question: </label><input name="Number" type="text" pattern="^[0-9]*$" size='50' />
			<br><br>
            <label>Question: </label><input name="Question" type="text" size='80'/><br></br>
            <label>Answer #1: </label><input name="Answer1" type="text" size='80'/><br></br>
            <label>Answer #2: </label><input name="Answer2" type="text" size='80'/><br></br>
            <label>Answer #3: </label><input name="Answer3" type="text" size='80'/><br></br>
            <label>Answer #4: </label><input name="Answer4" type="text" size='80'/><br></br>
            <input name="submit" value ="Add New Question" type="submit" onclick="getTitle()"/>
        </form>

<button name="createSurvey" value='Create New Survey' type="button" onclick="createSurvey(), viewSurvey.php">Create Survey</button>
<p id="error"></p>

<script type="text/javascript">

    var title = null;

			
            var url = document.location.href;
            $_GET = getForm(url);
            var counter = 0;
            var answers = [];
            for (property in $_GET) {
                var str = $_GET[property]; //Place property value in string
                var dec = decodeURIComponent(str); //Convert to ascii
                var clean = dec.replace(/\++/g, ' '); //Remove + and replace by space
                $_GET[property] = clean; //Cleaned values
                counter++;
                if (counter > 2 && clean !== "")
                    answers.push(clean); //Place answers int their own array
            }

            function getTitle() {
            	title = document.getElementById("title").value;
            	localStorage.setItem("title", title);
            }
  
            var newQuestion = new Question($_GET["Number"], $_GET["Question"], answers);
            len = $_GET["Number"];
            localStorage.setItem(len, JSON.stringify(newQuestion));
            localStorage.setItem("len", len);
            for (var i = 1; i <= len; i++) {
                var temp = localStorage.getItem(i);
                var question = new Question(JSON.parse(temp));
                question.display();
                document.write('<button id="btn'+i+ '"' + 'onclick="deleteFunction(\''  + i + '\')">Delete</button>');
            }

            if(len>0) {
                document.getElementById("titlename").innerHTML = "Survey Name: " + localStorage.getItem("title");
            }


            function deleteFunction(num){
                localStorage.removeItem(num);    
            }
            
            function createSurvey(){

                if(getCookie("username")){
					var newlen = 0;
					for (var i = 1; i <= len; i++) {
						var string_question = localStorage.getItem(i);
						if(string_question == null) {
							continue;
						}else{
							newlen++;
							localStorage.setItem(newlen, string_question);
						}
					}
					localStorage.setItem("len", newlen);
					len = newlen;
                
					for (var i = 1; i <= len; i++) {
						var string_question = localStorage.getItem(i);
						setCookie("question" + i, string_question, 1);
					}
                
					var string_title = localStorage.getItem("title");
					setCookie("title",string_title, 1);

					setCookie("len", len, 1);
                
					window.location.assign("viewSurvey.php");
				}else{
                document.getElementById("error").innerHTML = "Error: User has not signed in.";
			}



    }
            
            
 </script>


</body>
</html>