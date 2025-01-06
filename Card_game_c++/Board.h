#pragma once

#include <vector>
#include "Card.h"

class Board {
public:
	void addCard(const Card& card);
	void removeCard(const Card& card);
	bool isEmpty() const;
	int getScore() const;
	Card chooseCard() const;
	std::string toString() const;
	void clearBoard();
	void playCard(const Card& card);
	const std::vector<Card>& getCards() const;

private:
	std::vector<Card> cards;
};
