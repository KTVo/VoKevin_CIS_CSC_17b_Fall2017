/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * File:   Shoe.h
 * Author: kevin
 *
 * Created on July 28, 2017, 3:54 PM
 */

#ifndef SHOE_H
#define SHOE_H

//System Libraries
#include <vector>
#include <cstdlib>

//User Libraries
#include "Card.h"
#include "Deck.h"

//Create shoe object
class Shoe{
private: 
    //Declare size variables
    static const int DECK_S = 52;
    static const int SUIT_S = 4;
    static const int FACE_S = 13;
    static const int NUM_DECKS = 6;
    
    //deck to fill shoe
    Card *aCard;
    
    //vector of cards
    vector<Card *> aShoe;
   
public: 
    //Constructor
    Shoe();
    
    //Accessors
    void printShoe();
    Card *dealCard();
    
   
    //Mutators
    void fillShoe();
    void shuffleShoe();
};



#endif /* SHOE_H */

