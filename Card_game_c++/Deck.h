#pragma once

#include <vector>
#include <random>
#include <chrono>
#include "Card.h"

class Deck {
public:
	Deck();
	Card drawCard();
	void shuffle();
	void clear();
	void generateDeck();

private:
	std::vector<Card> deck;
};