/*
 * File: Deck.cpp
 * Purpose: Implementation of Deck Object
 */

//System Libraries

//User Libraries
#include "Deck.h"

//Implement Constructor
Deck::Deck(){
    this->fillDeck();
    this->shuffleDeck();
}

//Deal a card from the deck
Card *Deck::dealCard(){
    Card *d = new Card;
    d = aDeck.back();
    aDeck.pop_back();
    return d;
}

//Shuffle the deck
void Deck::shuffleDeck(){
    std::random_shuffle(aDeck.begin(),aDeck.end());
}

//Print vector of pointer to card objects
void Deck::prntVecOfCards(){
    vector<Card *>::const_iterator it=aDeck.begin();
    for(it;it!=aDeck.end();++it){
        cout<<(*it)->getGivenCard((*it)->getFace(),(*it)->getSuit())<<" \n";
    }
}

//Implement fill deck
void Deck::printDeck(){
    for(int i=1;i<FACE_S+1;i++){
        for(int j=1;j<SUIT_S+1;j++){
            cout<<aCard->getGivenCard(static_cast<FACE>(i),static_cast<SUIT>(j));
            cout<<" Card Value: ";
            cout<<aCard->getCardVal(static_cast<FACE>(i))<<"\n";
            cout<<"\n";
        }
    }
}

//Implement fill deck
void Deck::fillDeck(){
    for(int i=1;i<FACE_S+1;i++){
        for(int j=1;j<SUIT_S+1;j++){
            aCard = new Card(static_cast<FACE>(i), static_cast<SUIT>(j));
            aDeck.push_back(aCard);
        }
    }
}

//Implement Deconstructor
Deck::~Deck(){
    //delete aCard;
}