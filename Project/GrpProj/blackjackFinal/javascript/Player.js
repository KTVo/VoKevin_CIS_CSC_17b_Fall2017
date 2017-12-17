/*
	File: Player.js
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Player object for Blackjack
	Date: 10/16/17
*/

//create player class
function Player(){
	//member variables
	this.aShoe = new Shoe();
	this.aHand = new Hand();
	this.bust;
	this.balance = 1000;		//handles player money amt
	this.currentBet;	//keeps track of the current bet amt

	//this.viewShoe();
	//this.firstDeal();
	//this.prntHand();
	// document.write("Hand Score: "+this.getTotScore()+"<br>");
	//document.write("Card in Hand: "+this.getCardsInHand()+"<br>");

	//constructor functions

};

//doubles the current bet for the player
Player.prototype.doubleBet=function(){
	this.currentBet*2;
};

//removes given amount from player balance
Player.prototype.removeAmt=function(amt){
	this.balance-=amt;
};

//adds given amount to player balance
Player.prototype.addAmt=function(amt){
	this.balance+=amt;
};

//sets balance for player
Player.prototype.setBalance=function(amt){
	this.balance=amt;
};

//gets current balance from player
Player.prototype.getBalance=function(){
	return this.balance;
};

Player.prototype.constructor=function(shoe){
	this.aShoe = shoe;
	this.isBust();
};

Player.prototype.winBJ=function(){
	if(this.getTotScore()==21 && this.getCardsInHand()==2){
		return true;
	}
};

Player.prototype.isBust=function(){
	if(this.getTotScore()>21){
		this.bust=true;
	}else{
		this.bust=false;
	}
};

Player.prototype.firstDeal=function(){
	this.aHand.initDraw(this.aShoe.dealCard(),this.aShoe.dealCard());
};

Player.prototype.getTotScore=function(){
	return this.aHand.getHandTotal();
};

Player.prototype.prntHand=function(){
	return this.aHand.printHand();
};

Player.prototype.getCardsInHand=function(){
	return this.aHand.getNumCards();
};

//take another card;
Player.prototype.hit=function(){
	this.aHand.addCard(this.aShoe.dealCard());
};

//print deck
Player.prototype.viewShoe=function(){
	this.aShoe.printShoe();
};

//setbet
Player.prototype.setBet=function(bet){
	this.currentBet = bet;
}

//getbet
Player.prototype.getBet=function(){
	return this.currentBet;
}

//clear
Player.prototype.clearHand=function() {
	this.aHand = new Hand();
	this.currentBet = 0;
	this.bust = false;
}
