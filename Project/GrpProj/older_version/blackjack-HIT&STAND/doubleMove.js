/*



*/
function doubleMove(){
	//double the players current bet
	p1.doubleBet();

	//deal card to player
	p1.hit();

	//player stands
	standMove();

};