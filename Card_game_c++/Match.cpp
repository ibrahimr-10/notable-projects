#include <iostream>
#include "Match.h"

using namespace std;

Match::Match() : player_score(0), opponent_score(0), player_turn(true) {}

void Match::startMatch() {
    deck.shuffle();
    player_board.clearBoard();
    opponent_board.clearBoard();
    player_score = 0;
    opponent_score = 0;
    player_turn = true;

    for (int i = 0; i < 6; i++) {
        drawCard(player_board);
        drawCard(opponent_board);
    }

    while (!player_board.isEmpty() && !opponent_board.isEmpty()) {
        playTurn();
        player_turn = !player_turn;
    }

    printResult();
}

void Match::playTurn() {
    Board& active_board = player_turn ? player_board : opponent_board;
    Board& inactive_board = player_turn ? opponent_board : player_board;
    int& active_score = player_turn ? player_score : opponent_score;
    int& inactive_score = player_turn ? opponent_score : player_score;

    Card played_card;
    if (player_turn) {
        // Prompt the player to choose a card to play
        vector<Card> cards = active_board.getCards();
        cout << "Your cards: ";
        for (int i = 0; i < cards.size(); i++) {
            cout << i + 1 << ": " << cards[i].toString() << " ";
        }
        cout << endl;
        int choice;
        cout << "Choose a card to play (1-" << cards.size() << "): ";
        cin >> choice;
        played_card = cards[choice - 1];
    }
    else {
        played_card = opponent_board.chooseCard();
    }
    active_board.playCard(played_card);
    switch (played_card.getType()) {
    case CardType::POWER_PLUS:
        active_score += played_card.getValue();
        break;
    case CardType::POWER_MINUS:
        inactive_score -= played_card.getValue();
        break;
    case CardType::STEAL:
        Card stolen_card;
        if (inactive_board.isEmpty()) {
            stolen_card = Card();
        }
        else {
            stolen_card = inactive_board.chooseCard();
            inactive_board.removeCard(stolen_card);
        }
        active_board.addCard(stolen_card);
        break;
    }
    cout << "Played card: " << played_card.toString() << endl;
    cout << "Active board:\n" << active_board.toString() << endl;
    cout << "Inactive board:\n" << inactive_board.toString() << endl;
    cout << "Active score: " << active_score << endl;
    cout << "Inactive score: " << inactive_score << endl;
    cout << endl;
}


void Match::drawCard(Board& board) {
    Card drawn_card = deck.drawCard();
    board.addCard(drawn_card);
}

void Match::printResult() {
    cout << "Player score: " << player_score << endl;
    cout << "Opponent score: " << opponent_score << endl;
    if (player_score > opponent_score) {
        cout << "Player wins!" << endl;
    }
    else if (opponent_score > player_score) {
        cout << "Opponent wins!" << endl;
    }
    else {
        cout << "Tie game!" << endl;
    }
}

int main() {
    Match match;
    match.startMatch();
    return 0;
}
