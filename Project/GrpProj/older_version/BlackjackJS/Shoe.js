/*
	File: Shoe.js 
	Author: Kevin Romero
	Class: CSC17B Team Blackjack
	Purpose: Shoe object for Blackjack
	Date: 10/16/17
*/

function Shoe(){
	//declare size variables
	this.DECK_S = 52;
	this.SUIT_S = 4;
	this.FACE_S = 13;
	this.NUM_DECKS =6;

	//card to fill shoe
	this.aCard;

	//container for cards
	this.aShoe=[];

	//constructor functions
	this.fillShoe();
	//this.shuffleShoe();
	//this.printShoe();
	

};

/*
	* Deal function
	* Creates a temporary card object, copies the last
	* element of shoe array into the temporary object.
	* remove last element of shoe array and returns card object
*/
Shoe.prototype.dealCard=function(){
	var c = new Card();
	c = this.aShoe[this.aShoe.length-1];
	this.aShoe.pop();
	return c;
};

//shuffle shoe contents
Shoe.prototype.shuffleShoe=function(){
	for(var i=this.aShoe.length-1;i>0;i--){
		var j=Math.floor(Math.random()*(i+1));
		var temp=this.aShoe[i];
		this.aShoe[i]=this.aShoe[j];
		this.aShoe[j]=temp;
	}
};

//Print shoe contents
Shoe.prototype.printShoe=function(){
	for(var i=0;i<this.aShoe.length;i++){
		//this.aShoe[i].getPict();
		this.aShoe[i].isUpOrDown();
		document.write("<br>");
	}
};

//Fill shoe
Shoe.prototype.fillShoe=function(){
	for(var i=0;i<this.NUM_DECKS;i++){
		for(var k=1;k<this.FACE_S+1;k++){
			for(var j=1;j<this.SUIT_S+1;j++){
				this.aCard = new Card(k,j);
				this.aShoe.push(this.aCard);
			}
		}
	}
};

