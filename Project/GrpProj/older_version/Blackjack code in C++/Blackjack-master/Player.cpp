/* 
 * File:   Player.cpp
 * Author: Kevin Romero
 * Purpose: Implementation of Player Object for Blackjack
 * Created on July 12, 2017, 5:16 PM
 */

//System Libraries

//User Libraries
#include "Player.h"

//Implement Default Constructor
Player::Player(){
    this->isBust();
    this->firstDeal();
}

//Copy deck
Player::Player(Shoe *s){
    this->aShoe = s;
    this->isBust();
    this->firstDeal();
}

//default win
bool Player::winBJ(){
    return (this->aHand.getHandTotal()==21 && this->aHand.getNumCards() == 2);
}

//Det. if player bust
bool Player::isBust(){
    if(aHand.getHandTotal()>21)
        return true;
    return false;
}

//Get total hand score
const int Player::getTotScore(){
    return aHand.getHandTotal();
}

//Print cards in hand
void Player::prntHand(){
    aHand.printHand();
}

//Implement Constructor
void Player::firstDeal(){
    aHand.initDraw(aShoe->dealCard(),aShoe->dealCard());
}

//take another card
void Player::hit(){
    aHand.addCard(aShoe->dealCard());
}

//Print the deck
void Player::viewShoe(){
    aShoe->printShoe();
}
