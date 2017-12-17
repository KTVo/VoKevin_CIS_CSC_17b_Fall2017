/*
	File: Player.js 
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Player object for Blackjack
	Date: 10/16/17
*/

//create player class
function Player(shoe,n){	//takes in a shoe, name, starting bal.
	//member variables
	this.aShoe = new Shoe();
	this.aHand = new Hand();
	this.name;
	this.balance;

	//constructor actions
	this.aShoe=shoe;		//copy given shoe
	this.name=n;			//set name
			

};

//Copies a shoe to player object's shoe
Player.prototype.copy_constructor=function(shoe){
	this.aShoe=shoe;
};

//Functions

//removes given amount from player balance
Player.prototype.removeAmt=function(amt){
	this.balance-=amt;
};

Player.prototype.addMoney=function(amt){
	this.balance+=amt;	//deposits given amount to player
};

//sets whole balance to given amt
Player.prototype.setBalance=function(amt){
	this.balance=amt;
};

Player.prototype.getBalance=function(){
	return this.balance;
};

Player.prototype.getName=function(){
	return this.name;
};

//if player score is 21 and has 2 cards in hand, returns true
Player.prototype.winBJ=function(){
	if(this.getTotScore()==21 && this.getCardsInHand()==2){
		return true;
	}
};

//flips card 
Player.prototype.flipFirst=function(){
	this.aHand.flipFirstCard();
};

Player.prototype.isBust=function(){
	if(this.getTotScore()>21){
		this.bust=true;
	}else{
		this.bust=false;
	}
};

//deals 2 cards
Player.prototype.firstDeal=function(){
	this.aHand.initDraw(this.aShoe.dealCard(),this.aShoe.dealCard());
};

//return total points of cards in hand
Player.prototype.getTotScore=function(){
	return this.aHand.getHandTotal();
};

//prints cards in hand
Player.prototype.prntHand=function(){
	this.aHand.printHand();
};

//returns number of cards in hand
Player.prototype.getCardsInHand=function(){
	return this.aHand.getNumCards();
};

//take another card;
Player.prototype.hit=function(){
	this.aHand.addCard(this.aShoe.dealCard());

	var score = this.getTotScore();

	if(score>21){
		this.setStatus(3);
	}else if(score==21){
		this.setStatus(5);
	}
	return true;
};

//draw card from shoe to hand
Player.prototype.drawCard=function(){
	this.aHand.addCard(this.aShoe.dealCard());
};

//print deck
Player.prototype.viewShoe=function(){
	this.aShoe.printShoe();
};


