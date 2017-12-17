/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//System Libraries

//User Libraries
#include "Shoe.h"

//Implement constructor
Shoe::Shoe(){
    this->fillShoe();
    this->shuffleShoe();
    this->shuffleShoe();
    this->shuffleShoe();
}

//Implement deal function
Card *Shoe::dealCard(){
    Card *c = new Card();
    c = aShoe.back();
    aShoe.pop_back();
    return c;
}

//Shuffle function
void Shoe::shuffleShoe(){
    std::random_shuffle(aShoe.begin(),aShoe.end());
}

//Implement fill function
void Shoe::fillShoe(){
    for(int i=0;i<NUM_DECKS;i++){
        for(int k=1;k<FACE_S+1;k++){
            for(int j=1;j<SUIT_S+1;j++){
                aCard = new Card(static_cast<FACE>(k), static_cast<SUIT>(j));
                aShoe.push_back(aCard);
            }
        } 
    }
}

//Implement print function 
void Shoe::printShoe(){
    vector<Card *>::const_iterator it=aShoe.begin();
    for(it;it!=aShoe.end();++it){
        cout<<(*it)->getGivenCard((*it)->getFace(),(*it)->getSuit());
        cout<<"\n";
    }
}

