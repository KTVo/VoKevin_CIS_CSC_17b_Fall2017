/*
	File: Deal.js 
*/

/* global a, p1*/


function Bet(bet) {
	p1.setBet(bet);
}

function Deal() {
  

    document.getElementById("moveBtn01").disabled = true;
	document.getElementById("moveBtn02").disabled = false;
	document.getElementById("moveBtn03").disabled = false;
	document.getElementById("moveBtn04").disabled = false;

	//shuffle function 
	s.shuffleShoe();
	// document.write("Printint shoe");
	// s.printShoe();
	a.prntDealerHand();

	//delcare players and house
	a.constructor(s);
	p1.constructor(s);

    //show dealer cards face&suits
	a.firstDeal();
	// document.getElementById("00").innerHTML = JSON.stringify(a.prntHand());
	// document.getElementById("dealerscore").innerHTML = a.getTotScore();

    //show dealer cards, one up and one down 
	var dealerArray = JSON.parse(JSON.stringify(a.prntHand()));
	document.getElementById("dimg"+0).src = dealerArray[0]+".jpg";
	document.getElementById("dimg"+0).style.visibility = "visible";
	document.getElementById("dimg"+1).src = "back.jpg";
	document.getElementById("dimg"+1).style.visibility = "visible";

	//show cards face&suits
	p1.firstDeal();
	// document.getElementById("01").innerHTML = JSON.stringify(p1.prntHand());
	


    // show cards images
	var handArray = JSON.parse(JSON.stringify(p1.prntHand()));
    for(var i = 0; i < handArray.length; i++){

	document.getElementById("img"+i).src = handArray[i]+".jpg";
	document.getElementById("img"+i).style.visibility = "visible";    

}


// document.getElementById("score_01").innerHTML = p1.getTotScore();

 document.getElementById("score_01").innerHTML = p1.getTotScore();


	
	if(p1.winBJ()){

		document.getElementById("result").innerHTML = "BJ! You won!";
		//add the bet to balance
		p1.addAmt(bet);
	    document.getElementById('balance').innerHTML='$' + p1.getBalance();	
		}

}



