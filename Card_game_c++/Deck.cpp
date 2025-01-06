#include "Deck.h"
#include <algorithm>
#include <random>
#include <chrono>
#include <iostream>

Deck::Deck() {
    generateDeck();
    shuffle();
}

void Deck::generateDeck() {
    std::cout << "Generating deck...\n"; 
    std::cout << "When entering the card details enter value of the card aswell. e.g. power_plus 7\n";
    // Generate at least one card of each type
    deck.push_back(Card(CardType::POWER_PLUS, 1));
    deck.push_back(Card(CardType::POWER_MINUS, 2));
    deck.push_back(Card(CardType::STEAL, 3));

    // Generate additional cards to reach at least 20
    int remaining_cards = 17;
    int power_plus_count = 1;
    int power_minus_count = 1;
    int steal_count = 1;
    while (remaining_cards > 0) {
        std::cout << "Enter card details (value): ";
        std::string card_details;
        std::getline(std::cin, card_details);
        std::istringstream iss(card_details);
        std::string card_type;
        int card_value;
        if (iss >> card_type >> card_value) {
            if (card_type == "power_plus" && power_plus_count < 10) {
                deck.push_back(Card(CardType::POWER_PLUS, card_value));
                power_plus_count++;
                remaining_cards--;
            }
            else if (card_type == "power_minus" && power_minus_count < 10) {
                deck.push_back(Card(CardType::POWER_MINUS, card_value));
                power_minus_count++;
                remaining_cards--;
            }
            else if (card_type == "steal" && steal_count < 5) {
                deck.push_back(Card(CardType::STEAL, card_value));
                steal_count++;
                remaining_cards--;
            }
            else {
                std::cout << "Invalid card type or too many cards of this type. Please try again.\n";
            }
        }
        else {
            std::cout << "Invalid input. Please try again.\n";
        }
    }
    std::cout << "Deck generated!\n";
}

Card Deck::drawCard() {
    Card drawn_card = deck.back();
    deck.pop_back();
    return drawn_card;
}

void Deck::shuffle() {
    std::default_random_engine rng(static_cast<unsigned int>(std::chrono::system_clock::now().time_since_epoch().count()));
    std::shuffle(deck.begin(), deck.end(), rng);
}

void Deck::clear() {
    deck.clear();
}
