/* 
 * File:   main.cpp
 * Author: Kevin Romero
 * Purpose: Main Implementation of Blackjack Game
 * Created on June 28, 2017, 8:43 PM
 */

//System Libraries
#include <iostream>
#include <cstdlib>
#include <string>
using namespace std;

//User Libraries
#include "Player.h"
#include "Dealer.h"
#include "Shoe.h"

//Function Prototypes
void toUpper(string &);     //converts user input to uppercase

//Begin Execution
int main(int argc, char** argv) {   
    Shoe *aShoe = new Shoe();
    Player user(aShoe);
    Dealer house(aShoe);
    string ch;
    
    cout<<"\nYour Hand: ";
    user.prntHand();
    cout<<"\n";
    cout<<"Hand Total: "<<user.getTotScore()<<"\n";
    
    cout<<"\n\nHouse Hand: ";
    house.prntDealerHand();
    cout<<"\n";
    cout<<"Dealer Total: "<<house.getTotScore()<<"\n";
    
    if(user.winBJ()){
        cout<<"You won!\n";
    }
    else if(house.winBJ()){
        cout<<"You Lost, The Dealer Beat You!\n";
    }
    else{
        while(!user.isBust()){
            cout<<"\nWould You Like to Hit or Stand?\n\n";
            cout<<"Enter an H for Hit or S for Stand.\n";
            cin>>ch;
            toUpper(ch);
            cout<<"You typed: "<<ch<<"\n";
            
            if(ch == "H"){
                user.hit();
                if(user.getTotScore() == 21){
                    cout<<"\nYou Won!!\n";
                    cout<<"Your Score was: "<<user.getTotScore()<<"\n";
                    break;
                }
            }
            else if(ch =="S"){
                house.game(user);
                break;
            }
            cout<<"Your hand after hitting: ";
            user.prntHand();
            cout<<"\n\n";
            cout<<"Hand Total after hitting: "<<user.getTotScore()<<"\n\n";
            
            if(user.isBust()){
                cout<<"You went over 21!\n";
            }
     }
    }
            
    

    
    //Exit stage right
    return 0;
}

//char to upper
void toUpper(string &c){
    for(int i=0;i<c.size();i++){
        c.at(i) = std::toupper(c.at(i));
    }
}

