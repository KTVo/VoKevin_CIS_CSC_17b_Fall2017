/*
	File: Dealer.js
	Author: Kevin Romero
	Purpose: Dealer class for Blackjack

*/

//Create dealer object
function Dealer(){

};

//Create object reference
Dealer.prototype = Object.create(new Player());

//constructor
Dealer.prototype.constructor=function(shoe){
	this.aShoe=shoe;
	this.isBust();
};

//print dealer hand
Dealer.prototype.prntDealerHand=function(){
	this.aHand.printHand();
};

//print dealer deck
Dealer.prototype.prntHouseDeck=function(){
	this.viewShoe();
};

//implement gameplay
Dealer.prototype.game=function(p){
	while(this.aHand.getHandTotal() < 17){
		// this.prntDealerHand();
		// document.write("<br>");

		if(this.aHand.getHandTotal() > p.getTotScore() &&
			this.aHand.getHandTotal() <= 21){
			// document.write("The House Wins! <br>");
			// document.write("House Score was : "+
				// this.aHand.getHandTotal()+"<br>");
			return;
		}
		if(this.aHand.getHandTotal() == p.getTotScore()){
			// document.write("Tied! <br>");
			return;
		}
		this.hit();
	}
	if(this.aHand.getHandTotal() > 21){
		// document.write("House Busted! You Won! <br>");
		return;
	}
};
