/*
	File: Hand.js
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Hand object for Blackjack
	Date: 10/16/17
*/

//Create Hand class
function Hand(){
	//member variables
	this.m_hand=[];
	this.handTotal;

	};


//add card to hand
Hand.prototype.addCard=function(card){
		this.m_hand.push(card);
};

//draw 2 cards to start round
Hand.prototype.initDraw=function(card1,card2){
	this.m_hand.push(card1);
	this.m_hand.push(card2);
};

//print the hand
Hand.prototype.printHand=function(){
	var h = [];
	if(this.m_hand.length<=0){
		h.push("<br>HAND EMPTY<br>");
	}else{
		for(var i=0;i<this.m_hand.length;i++){
			h.push(this.m_hand[i].getSetCard());
		}
	}
	return h;
};



//calculate hand total
Hand.prototype.getHandTotal=function(){
	var n=0;

	for(var i=0;i<this.m_hand.length;i++){
		n+=this.m_hand[i].getCardVal(this.m_hand[i].getFace());

	}
	this.handTotal = n;
	

	return this.handTotal;
};

//Accessors
Hand.prototype.getNumCards=function(){
	return this.m_hand.length;
};
