/* 
 * File:   Card.h
 * Author: Kevin Romero
 * Purpose: Card Class
 * Created on June 28, 2017, 8:56 PM
 */

#ifndef CARD_H
#define CARD_H

//System Libraries
#include <vector>
#include <string>
#include <assert.h>
#include <stdexcept>


//Enums
enum SUIT{SPADES=1, HEARTS, CLUBS, DIAMONDS};
enum FACE{ACE=1, TWO, THREE, FOUR, FIVE, SIX, SEVEN, EIGHT, NINE, 
                TEN, JACK, QUEEN, KING, fCount};

//Create Card Class
class Card{
private:
    SUIT m_suit;        //Holds current suit
    FACE m_face;        //Holds current face
    
public:             

    //Constructors
    Card();
    Card(FACE const&,SUIT const&);
    Card(int);
    
    //Mutators
    void setFace(FACE f){m_face=f;}
    void setSuit(SUIT s){m_suit=s;}
    
    //Accessors 
    FACE getFace() const{return m_face;}
    SUIT getSuit() const{return m_suit;}
    int getCardVal(FACE const&);
    std::string getGivenCard(FACE const&,SUIT const&);
 
    //To string functions
    std::string toString(FACE const&);
    std::string toString(SUIT const&);
   
   
    
    
};



#endif /* CARD_H */

