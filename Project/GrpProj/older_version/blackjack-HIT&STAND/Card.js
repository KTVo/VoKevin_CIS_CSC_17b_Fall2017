/*
	File: Card.js
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Card object for Blackjack
	Date: 10/16/17
*/


//Enums
var SUIT = Object.freeze({"spades":1, "hearts":2, "clubs":3,
										"diamonds":4});
var FACE = Object.freeze({"ace":1, "two":2, "three":3, "four":4, "five":5,
						"six":6, "seven":7, "eight":8, "nine":9,
						"ten":10,"jack":11,"queen":12,"king":13,"fCount":14});


//Card Class
function Card(face,suit){
	//member variables
	this.m_suit;
	this.m_face;

	//constructor
	this.setCard(face,suit);
};

//Constructors
Card.prototype.setCard=function(face,suit){
	this.setFace(face);
	this.setSuit(suit);
};

/*Card.prototype.setCardI=function(i){
	this.setSuit(i/FACE.fCount);
	this.setFace(i%FACE.fCount);
}*/

//Mutators
Card.prototype.setFace=function(face){
	this.m_face=face;
};

Card.prototype.setSuit=function(suit){
	this.m_suit=suit;
};

//Accessors
Card.prototype.getSetCard=function(){
	return this.toStringFace(this.getFace()) +this.toStringSuit(this.getSuit());
};

Card.prototype.getCardVal=function(face){
	switch(face){
		case FACE.jack:
			return 10;
		case FACE.queen:
			return 10;
		case FACE.king:
			return 10;
		default: return face;
	}
};

Card.prototype.getGivenCard=function(face,suit){
	return this.toStringFace(face)+" of "+this.toStringSuit(suit);
};


Card.prototype.getFace=function(){
	return this.m_face;
};

Card.prototype.getSuit=function(){
	return this.m_suit;
};

//toString functions
Card.prototype.toStringSuit=function(suit){
	switch(suit){
		case 1:
			return "spades";
		case 2:
			return "hearts";
		case 3:
			return "clubs";
		case 4:
			return "diamonds";
		default: return "ERROR";
	}
};

Card.prototype.toStringFace=function(face){
	switch(face){
		case 1:
			return "ace";
		case 2:
			return "two";
		case 3:
			return "three";
		case 4:
			return "four";
		case 5:
			return "five";
		case 6:
			return "six";
		case 7:
			return "seven";
		case 8:
			return "eight";
		case 9:
			return "nine";
		case 10:
			return "ten";
		case 11:
			return "jack";
		case 12:
			return "queen";
		case 13:
			return "king";
		default:
			return "error";
	}
};
