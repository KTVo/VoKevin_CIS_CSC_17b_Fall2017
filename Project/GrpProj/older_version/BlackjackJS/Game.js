/*



*/

function Game(){

};

//takes in shoe, player, dealer, card count, bet amount
Game.prototype.newDeal=function(sh,pl,deal,cnt,bet){
	if(cnt>40){
		sh.shuffleShoe();
		cnt=0;
	}
	pl.drawCard();
	cnt++;
	deal.drawCard();
	cnt++;
	pl.drawCard();
	cnt++;
	deal.drawCard();
	cnt++;

	this.gameInfo(pl,deal,bet);
	this.dealerPlay(deal,cnt);
	if(this.whoWon(pl,deal)==2){
		this.gameSummary(pl,deal,bet);
		pl.addMoney(bet*3);
		document.write("Dealer Lost "+"<br>"+"You Win! "+(bet*3)
			+"<br> Current Balance: "+pl.getBalance()+"<br>");
		document.write("<br> New Deal <br>");
		bet = this.makeBet(pl);
		this.newDeal(sh,pl,deal,cnt,bet);
	}
};

//takes in player, dealer, bet amount
Game.prototype.gameInfo=function(pl,deal,bet){
	document.write("Player: "+pl.getName()+"<br>"+
		"Cash: "+pl.getBalance()+"<br>"
		+"Current Bet: "+bet+"<br><br>"
		+"Player Hand: <br>");
	pl.prntHand();
	document.write("Player Score: "+pl.getTotScore()+"<br><br>");
	document.write("Dealer's Hand: "+"<br>");
	deal.prntDealerHand();
		document.write("Dealer Score: "+deal.getTotScore()+"<br>");
};

Game.prototype.dealerPlay=function(deal,cnt){
	while(deal.getTotScore()<17){
		deal.drawCard();
		cnt++;
	}
};

Game.prototype.whoWon=function(pl,deal){
	if(pl.getTotScore()>21) return -2;
	else if(deal.getTotScore()>21) return 2;
	else if(pl.getTotScore()==21) return 3;
	else if(pl.getTotScore()<21&&pl.getTotScore()>deal.getTotScore()) return 1;
	else if(pl.getTotScore()<21&&pl.getTotScore()==deal.getTotScore()) return 0;
	else if(pl.getTotScore()<21&&pl.getTotScore()<deal.getTotScore()) return -1;
};

Game.prototype.findWinner=function(pl,deal,bet){
	if(pl.getTotScore()>21){
		this.gameSummary(pl,deal,bet);
		document.write("<br> Dealer Won! <br> "+"You lost "+bet
						+"<br>"+"Current cash: "+pl.getBalance()
						+"<br><br>");
			return true;
	}
	else if(pl.getTotScore()==21){
		pl.addMoney(bet*3);
		this.gameSummary(pl,deal,bet);
		document.write("BlackJack! <br>"+"You Win! <br>"+(bet*3)+"<br>"
						+"<br> Current balance: "+pl.getBalance()+"<br><br>");
		return true;
	}
	else if(deal.getTotScore()>21){
		pl.addMoney(bet*3);
		this.gameSummary(pl,deal,bet);
		document.write("<br> Dealer lost <br>"+"You won <br>"(bet*3)+"<br>"
					+"<br> Current Balance: "+pl.getBalance()+"<br><br>");
		return true;
	}
};

Game.prototype.gameSummary=function(pl,deal,bet){
	document.write("Player "+pl.getName()+"<br>"
		+"Cash: "+pl.getBalance()+"<br>"
		+"Current Bet: "+bet+"<br><br>");
	document.write("Cards in Hand: <br>");
	pl.prntHand();
	document.write("<br>");
	document.write("Dealer's Hand: <br>");
	deal.prntDealerHand();
	document.write("<br>");
	document.write("Score: "+deal.getTotScore()+"<br>");
};

Game.prototype.makeBet=function(pl){
	var bet=0;
	alert("Make a Bet. Min $50");
	do{
		bet=prompt("Enter bet amount");
	}while(!((bet>=50)&&(bet<=pl.getBalance())));
	pl.removeAmt(bet);
	return bet;
};