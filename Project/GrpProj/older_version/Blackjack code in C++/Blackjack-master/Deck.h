/* 
 * File:   Deck.h
 * Author: Kevin Romero
 * Purpose: Deck Object using a Card Class
 * Created on July 4, 2017, 10:29 AM
 */

#ifndef DECK_H
#define DECK_H

//System Libraries
#include <iostream>
#include <vector>
#include <algorithm>
#include <utility>
#include <memory>
using namespace std;

//User Libraries
#include "Card.h"

//Create Deck Class using array of Cards
class Deck{
private:
    //Declare size variables
    static const int DECK_S = 52;
    static const int SUIT_S = 4;
    static const int FACE_S = 13;
    
    //Card to build deck
    Card *aCard;
    
    //vector of cards
    vector<Card *> aDeck;
   
public: 
    //Constructor
    Deck();
    
    //Deconstructor
    ~Deck();
    
    //Accessors
    void printDeck();
    void prntVecOfCards();
    Card *dealCard();
    
   
    //Mutators
    void fillDeck();
    void shuffleDeck();
    void pushDealt(Card *);
    void printDlt();
    
    
};



#endif /* DECK_H */

