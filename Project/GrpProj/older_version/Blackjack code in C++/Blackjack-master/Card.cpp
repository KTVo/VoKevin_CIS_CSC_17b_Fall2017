/*
 * File: Card.cpp
 * Purpose: Implementation of Card Class
 * Date: June 28, 2017
 */

//System Libraries
#include <iostream>

//User Libraries
#include "Card.h"

//Default Constructor
Card::Card(){
    
}

//Constructor
Card::Card(FACE const& f, SUIT const &s){
    this->setFace(f);
    this->setSuit(s);
}

//Constructor
Card::Card(int i){
    this->setSuit(static_cast<SUIT>(i/fCount));
    this->setFace(static_cast<FACE>(i%fCount));
}

//Get card number value
int Card::getCardVal(FACE const& f){
    switch(static_cast<int>(f)){
        case(static_cast<int>(FACE::JACK)):  return static_cast<int>(FACE::TEN);
        case(static_cast<int>(FACE::QUEEN)): return static_cast<int>(FACE::TEN);
        case(static_cast<int>(FACE::KING)):  return static_cast<int>(FACE::TEN);
        default:                             return static_cast<int>(f);
    }
}

//return given card as string
std::string Card::getGivenCard(const FACE& f, const SUIT& s){
    std::string str;
    str = this->toString(f) + " of " + this->toString(s);
    return str;
}

//Implement toString
std::string Card::toString(FACE const&f){
    switch(f){
        case FACE::ACE:     return "Ace";
        case FACE::TWO:     return "Two";
        case FACE::THREE:   return "Three";
        case FACE::FOUR:    return "Four";
        case FACE::FIVE:    return "Five";
        case FACE::SIX:     return "Six";
        case FACE::SEVEN:   return "Seven";
        case FACE::EIGHT:   return "Eight";
        case FACE::NINE:    return "Nine";
        case FACE::TEN:     return "Ten";
        case FACE::JACK:    return "Jack";
        case FACE::QUEEN:   return "Queen";
        case FACE::KING:    return "King";
        default: throw std::logic_error("invalid face");
   }
}

std::string Card::toString(SUIT const&s){
    switch(s){
        case SUIT::CLUBS:       return "Clubs";
        case SUIT::DIAMONDS:    return "Diamonds";
        case SUIT::HEARTS:      return "Hearts";
        case SUIT::SPADES:      return "Spades";
        default: throw std::logic_error("invalid suit");
    }

}