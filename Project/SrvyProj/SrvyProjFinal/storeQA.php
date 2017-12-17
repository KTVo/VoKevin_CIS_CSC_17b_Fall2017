<!DOCTYPE html>
<html>
<head>
	<title>Create Survey</title>
	<script type="text/javascript" src="Question.js" ></script>
    <script type="text/javascript" src="getForm.js"></script>
    <script type="text/javascript" src="cookieFunction.js"></script>

</head>

<body bgcolor= "orange">
<br><br>
<p align = "right"><button onclick="window.location.assign('index.php')">Sign In</button> <button onclick="window.location.assign('logout.php')">Sign Out</button></p>

<h1><center>Create Survey</center></h1>



 <form action = "storeQA.php" method ="get">
            <label>Question Number: </label><input name="Number" type="text" pattern="^[0-9]*$" size='1' />
			<br><br>
            <label>Question:</label><input name="Question" type="text" size='80'/><br></br>
            <label>Answer #1:</label><input name="Answer1" type="text" size='80'/><br></br>
            <label>Answer #2:</label><input name="Answer2" type="text" size='80'/><br></br>
            <label>Answer #3:</label><input name="Answer3" type="text" size='80'/><br></br>
            <label>Answer #4:</label><input name="Answer4" type="text" size='80'/><br></br>
            <input name="submit" value ="Add New Question" type="submit" />
        </form>

<button name="storeQA" value='Create New Survey' type="button" onclick="storeQA()">Create Survey</button>
<p id="error"></p>

<script type="text/javascript">


	
	var url = document.location.href;
	
	$_GET = getForm(url);
    var counter = 0;
	var arrAns = [];
            
	for (property in $_GET) {
        var str = $_GET[property]; 
        var dec = decodeURIComponent(str); 
        var clean = dec.replace(/\++/g, ' '); 
        
		$_GET[property] = clean;
        counter++;
        if (counter > 2 && clean !== "")
            arrAns.push(clean);
        }

    
  
    var q = new Question($_GET["Number"], $_GET["Question"], arrAns);
        
	length = $_GET["Number"];
    localStorage.setItem(length, JSON.stringify(q));
    localStorage.setItem("length", length);
        
	for (var i = 1; i <= length; i++) {
        var localQ = localStorage.getItem(i);
        var question = new Question(JSON.parse(localQ));

		question.display();
    }

    if(length>0) 
        document.getElementById("titlengthame").innerHTML = "Survey Name: " + localStorage.getItem("title");
		


    function storeQA(){
        if(getCookie("username")){
			var newlength = 0;
				
			for (var i = 1; i <= length; i++) {
				var strQ = localStorage.getItem(i);

				if(strQ == null) {
					continue;
				}else{
					newlength++;
					localStorage.setItem(newlength, strQ);
				}
			}

			localStorage.setItem("length", newlength);
			length = newlength;
                
			for (var i = 1; i <= length; i++) {
				var strQ = localStorage.getItem(i);
				setCookie("question" + i, strQ, 1);
			}
                
			var strTitle = localStorage.getItem("title");
	
			setCookie("title", strTitle, 1);

			setCookie("length", length, 1);
                
			window.location.assign("listSurvey.php");
		}else
            document.getElementById("error").innerHTML = "Error: Not logged in";
	}
            
            
 </script>


</body>
</html>