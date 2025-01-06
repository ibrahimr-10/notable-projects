#pragma once

#include "Deck.h"
#include "Board.h"

class Match {
private:
	Deck deck;
	Board player_board;
	Board opponent_board;
	int player_score;
	int opponent_score;
	bool player_turn;

public:
	Match();
	void startMatch();

private:
	void playTurn();
	void drawCard(Board& board);
	void printResult();

};
