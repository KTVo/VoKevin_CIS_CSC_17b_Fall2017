function Management(){
	this.aHand;
	this.balance;
	this.currentBet;
	this.printHand;
	this.face;
	this.suit;
}

Management.prototype.getBalance = function(){
	this.balance = JSON.parse(localStorage.getItem("objBalance"));
        if (this.balance === null) {
            this.balance = [];
        }
	return this.balance;
};
Management.prototype.setManageValues = function(aHand, balance /*face, suit*/){
	this.aHand = aHand;
	this.balance = balance;
	//this.currentBet = currentBet;

	//this.face = face;
	//this.suit = suit;
};



//Saves the game
Management.prototype.saveGame = function() {


	localStorage.setItem("objHand", JSON.stringify(this.aHand));
	localStorage.setItem("objBalance", JSON.stringify(this.balance));
	var v = localStorage.getItem("objBalance");



	setCookie("balance",v * 1,1);



}


	//localStorage.setItem("objFace", JSON.stringify(this.face));
	//localStorage.setItem("objSuit", JSON.stringify(this.objSuit));



//Load the game
Management.prototype.loadGame = function() {

	this.balance = JSON.parse(localStorage.getItem("objBalance"));
	var v = localStorage.getItem("objBalance");
	getCookie("balance",v,1);



        if (this.balance === null) {
            this.balance = [];
        }


		/*
	this.face = JSON.parse(localStorage.getItem("objFace"));
        if (this.face === null) {
            this.face = []
        }
	this.suit = JSON.parse(localStorage.getItem("objSuit"));
        if (this.suit === null) {
            this.suit = []
        }
		*/
};
