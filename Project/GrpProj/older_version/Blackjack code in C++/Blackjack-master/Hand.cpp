/* 
 * File:   Hand.cpp
 * Author: Kevin Romero
 * Purpose: Implementation of Hand Object for Blackjack
 * Created on July 12, 2017, 5:16 PM
 */

//System Libraries
#include <vector>

//User Libraries
#include "Hand.h"

//Implement Default Constructor
Hand::Hand(){
    
}

//Calculate hand total
int Hand::getHandTotal(){
    vector<Card *>::const_iterator it=m_hand.begin();
    int n=0;
    
    for(it;it!=m_hand.end();++it){
        n+=(*it)->getCardVal((*it)->getFace());
    }
    handTotal = n;
    return handTotal;
}

//print the hand
void Hand::printHand(){
    vector<Card *>::const_iterator it=m_hand.begin();
    for(it;it!=m_hand.end();++it){
        cout<<(*it)->getGivenCard((*it)->getFace(),(*it)->getSuit());
        cout<<" ";
    }
}

//Draw 2 cards to start round
void Hand::initDraw(Card* c, Card* c2){
    m_hand.push_back(c);
    m_hand.push_back(c2);
}

//Add a card to hand
void Hand::addCard(Card *c){
    m_hand.push_back(c);
}

Hand::~Hand() {
   
}


