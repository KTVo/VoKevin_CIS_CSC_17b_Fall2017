/* 
 * File:   Player.h
 * Author: Kevin Romero
 * Purpose: Player Class
 * Created on July 13, 2017, 1:13 AM
 */

#ifndef PLAYER_H
#define PLAYER_H

//System Libraries

//User Libraries
#include "Hand.h"
#include "Card.h"
#include "Shoe.h"

//Create player class
class Player{
protected:
    Shoe *aShoe = new Shoe();
    Hand aHand;
    bool bust;
    
public:
    //Default Constructor
    Player();
    
    //Constructor
    Player(Shoe *);
    
    //Mutators
    void hit();
    void firstDeal();       //Deals 2 cards to start round
    
    //Accessors
    void prntHand();
    const int getTotScore();
    bool isBust();
    bool winBJ();
    void viewShoe();
    
};



#endif /* PLAYER_H */

