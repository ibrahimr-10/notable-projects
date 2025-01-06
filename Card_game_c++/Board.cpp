#include "Board.h"
#include <algorithm>
#include <cstdlib>  
using namespace std;

void Board::addCard(const Card& card) {
    cards.push_back(card);
}

void Board::removeCard(const Card& card) {
    cards.erase(remove(cards.begin(), cards.end(), card), cards.end());
}

bool Board::isEmpty() const {
    return cards.empty();
}

int Board::getScore() const {
    int score = 0;
    for (const auto& card : cards) {
        if (card.getType() == CardType::POWER_PLUS) {
            score += card.getValue();
        }
        else if (card.getType() == CardType::POWER_MINUS) {
            score -= card.getValue();
        }
    }
    return score;
}

Card Board::chooseCard() const {
    return cards[rand() % cards.size()];
}

string Board::toString() const {
    string result;
    for (const auto& card : cards) {
        result += card.toString() + "\n";
    }
    return result;
}

void Board::clearBoard() {
    cards.clear();
}

void Board::playCard(const Card& card) {
    removeCard(card);
} 

std::vector<Card> const& Board::getCards() const {
    return cards;
}

