/* 
 * File:   Dealer.h
 * Author: Kevin Romero
 * Purpose: Dealer Class for Blackjack
 * Created on July 13, 2017, 3:50 PM
 */

#ifndef DEALER_H
#define DEALER_H

//System Libraries

//User Libraries
#include "Card.h"
#include "Shoe.h"
#include "Hand.h"
#include "Player.h"

//Create class
class Dealer: public Player{
private:
   
public:
    //Default Constructor
    Dealer(Shoe *);
    
    //Handle game logic
    void game(Player&);
    
    //Print dealer hand 
    void prntDealerHand();
    
    //Print deck
    void prntHouseDeck();
    
    
};



#endif /* DEALER_H */

