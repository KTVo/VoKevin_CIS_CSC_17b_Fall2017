<!DOCTYPE html>

<html>
<head>


  <script type="text/javascript" src="javascript/cookieFunction.js"></script>
  <script type="text/javascript" src="javascript/Card.js"></script>
	<script type="text/javascript" src="javascript/Deck.js"></script>
	<script type="text/javascript" src="javascript/Shoe.js"></script>
	<script type="text/javascript" src="javascript/Hand.js"></script>
	<script type="text/javascript" src="javascript/Player.js"></script>
	<script type="text/javascript" src="javascript/Dealer.js"></script>
	<script type="text/javascript" src="javascript/Deal.js"></script>
	<script type="text/javascript" src="javascript/hitMove.js"></script>
	<script type="text/javascript" src="javascript/standMove.js"></script>
   <script src = "save_load_game.js"></script>

<style>
  body, html {
    height: 100%;
    margin: 0;

    background-image: url("images/table+background.png");

    height: 100%;
	width: 100%;

    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    position: relative;
  }

	.Center{
		position:absolute;
		left: 40%;
		margin-top:35%;
		width:80%;

	}
	.btn-bot{
		position: absolute;
		bottom: 0%;
	}

	.imgdealer{
    border: 10px solid;
    background-color: transparent;
    border-image: url(images/dealer.png) 50 round;
    width:220px;
    height:65px;
    top:50px;
    right:43%;
    align-content: center;
    position: absolute;
    box-shadow: 10px 10px 5px;

}

	.img00{
    border: 10px solid transparent;
    background-color: transparent;
    width:220px;
    height:65px;
    margin:auto;
    top:310px;
    left:300px;
    position: absolute;


}

#dealerscore{
    border: 2px dotted transparent;
	width: 25px;
	height: 25px;
    color: rgb(255,212,82);
    text-align: center;
    top:15px;
    left:500px;
    align-content: center;
    position: absolute;
    font-size: 30px;
}

#result {
	border: 2px dotted transparent;
	width: 500px;
	height: 25px;
    color: black;
    text-align: left;
    margin:auto;
    top:380px;
    left:300px;
    position: absolute;
    font-size: 30px;
    font-style: italic;

}

#score_01{
	border: 2px dotted transparent;
	width: 25px;
	height: 25px;
    color: rgb(255,212,82);
    text-align: center;
    margin:auto;
    top:305px;
    left:275px;
    position: absolute;
    font-size: 30px;


}

#myBtn{
	font-size: 12px;
	width: 50px;
	align-content: center;
	border: none;
	box-shadow: 0 5px orange;
	background-color: gold;
}

.fa fa-bitcoin{
	font-size: 24px;
}


div.bet{
	background-color: SeaGreen;
	width:30%;
	align-self: center;
	height: 70px;
	color: red;
	position: absolute;
	top:650px;
	left:230px;
	border: 10px solid;
    border-image: url(images/dealer.png) 50 round;
    font-style: italic;
	font-size: 24px;
	text-align: center;

}

div.balance{
	background-color: SeaGreen;
	width:30%;
	align-self: center;
	height: 70px;
	color: red;
	position: absolute;
	top:650px;
	left:800px;
	border: 10px solid;
	border-image: url(images/dealer.png) 50 round;
	font-style: italic;
	font-size: 24px;
	text-align: center;


}

#moveBtn01,#moveBtn02,#moveBtn03,#moveBtn04,#moveBtn05{
	width:50px;
	font-size: 12px;
    align-content: center;
	background-color: transparent;
	border:2px solid orange;
}

.button{
	position: absolute;
	top:70%;
	left:8%;
	margin: 5px;
}



</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<p id="username" style= "color:white;"></p>
<script>

  document.getElementById("username").innerHTML = "Welcome " + getCookie('username') + "!!";
</script>


<form action="leaderboard_earning_ascend.php" target="_blank">
	<input type="submit" value="Show Leaderboard" />
</form>

<form action="rules.html" target="_blank">
	<input type="submit" value="Show Rules" />
</form>

<div class ="dealer">
	<p id="00"></p>
	<p id="dealerscore"></p>
		<div class="imgdealer" >
		<img id = "dimg0" src = "" width = "40" height="60" align = "bottom" style="visibility:hidden">
		<img id = "dimg1" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "dimg2" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "dimg3" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "dimg4" src = "" width = "40" height="60" style="visibility:hidden">
	</div>
</div>

<div class ="player1">
	<p id="01"></p>
	<p id="score_01"></p>
	<p id="result"></p>

	<div class="img00" >
		<img id = "img0" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "img1" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "img2" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "img3" src = "" width = "40" height="60" style="visibility:hidden">
		<img id = "img4" src = "" width = "40" height="60" style="visibility:hidden">
	</div>

</div>

<div  class='Center' align='bottom'>
	<button id ="moveBtn01" onclick = "Deal()" disabled>Deal</button>
	<button id="moveBtn02" onclick = "hitMove()" disabled>Hit</button>
	<button id="moveBtn03" onclick = "standMove()" disabled>Stand</button>
	<button id="moveBtn04" onclick = "doubleMove()" disabled>Double</button>
	<button id="moveBtn05" onclick = "replay()">Replay</button>
</div>



<div class='button'>
<i class="fa fa-bitcoin" style="color:gold"></i>
<button id='myBtn' value="25" onclick="getButtonValue(this)"> $25</button>
<i class="fa fa-bitcoin" style="color:gold"></i>
<button id='myBtn' value="50" onclick="getButtonValue(this)"> $50</button>
<i class="fa fa-bitcoin" style="color:gold"></i>
<button id='myBtn' value="100" onclick="getButtonValue(this)"> $100</button>
<i class="fa fa-bitcoin" style="color:gold"></i>
<button id='myBtn' value="200" onclick="getButtonValue(this)"> $200</button>
<i class="fa fa-bitcoin" style="color:gold"></i>
<button id='myBtn' value="500" onclick="getButtonValue(this)"> $500</button>
	</div>




<div class='bet'>
	<p><i class="fa fa-bitcoin" style="color:gold"></i>
		<b>You want to bet:
	<span id='currentBet' style="color: orange"></span></b></p>
</div>

<div class = "balance"> <p><i class="fa fa-bitcoin" "style=color:gold"></i><b>Your balance have:
<span id = "balance" style="color: orange">$1000</span></b></p></div>;



<script>


	var s = new Shoe();
	var a = new Dealer();
	var p1 = new Player();
	var cardObj = new Card();
	var manage = new Management();
	var handObj = new Hand();
	var x;
	//manage.setManageValues(p1.getCardsInHand(),p1.getBalance() /*cardObj.getFace(), cardObj.getSuit()*/);
	manage.loadGame();



	manage.saveGame();

	p1.setBet(manage.getBalance());

	document.getElementById("balance").innerHTML = localStorage.getItem('balance');


	function getButtonValue(button){

		var x = parseInt(button.value);
		p1.setBet(x);
		if(p1.getBet() <= p1.getBalance()){
		document.getElementById('currentBet').innerHTML = '$' + p1.getBet();
	}else{
		document.getElementById('currentBet').innerHTML = "balance insufficient~!";
	}

      document.getElementById("moveBtn01").disabled = false;

	  manage.setManageValues(p1.getCardsInHand(),p1.getBalance() /*cardObj.getFace(), cardObj.getSuit()*/);
	  manage.saveGame();

	}

	function doubleMove() {
		bet = p1.getBet();
		p1.setBet(bet*2);
        document.getElementById('currentBet').innerHTML = '$' + p1.getBet();
                hitMove();
		manage.setManageValues(p1.getCardsInHand(),p1.getBalance() /*cardObj.getFace(), cardObj.getSuit()*/);
		manage.saveGame();
	}

	function replay() {
		a.clearHand();
		p1.clearHand();
		document.getElementById('currentBet').innerHTML = " ";

		for (i = 0; i < 5; i++){
			document.getElementById("dimg"+i).style.visibility = "hidden";
			document.getElementById("img"+i).style.visibility = "hidden";
		}

		document.getElementById("result").innerHTML = " ";
		document.getElementById("score_01").innerHTML = " ";
		document.getElementById("dealerscore").innerHTML=" ";

		document.getElementById("moveBtn02").disabled = true;
		document.getElementById("moveBtn03").disabled = true;
		document.getElementById("moveBtn04").disabled = true;

		manage.setManageValues(p1.getCardsInHand(),p1.getBalance()/*cardObj.getFace(), cardObj.getSuit()*/);
		manage.saveGame();
	}
		if(p1.getTotScore() > 21){
		alert("You Lose");
		replay();
	}
	manage.setManageValues(p1.getCardsInHand(),p1.getBalance() /*cardObj.getFace(), cardObj.getSuit()*/);
	manage.saveGame();


	</script>

<?php
include ('sql/connect_mysql.php');
//$_COOKIE['balance'] = 2000;


//echo "HELLO";
if(isset($_COOKIE['username']) && isset($_COOKIE['balance']))
{

$username = $_COOKIE['username'];
$balance = $_COOKIE['balance'];


// echo $balance;
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
$sql = "UPDATE users SET balance = '" . $balance . " 'WHERE username = '" . $username . "'";

if ($mysqli->query($sql) === TRUE ){

}
else {
echo "Error loading balance " . $mysqli->error;

}

}

?>


</body>
</html>
