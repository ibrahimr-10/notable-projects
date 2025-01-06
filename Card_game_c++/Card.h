#ifndef CARD_H
#define CARD_H

#include <string>
#include <sstream>

enum class CardType {
    POWER_PLUS,
    POWER_MINUS,
    STEAL
};

class Card {
public:
    Card(CardType type, int value);

    Card();

    bool operator==(const Card& other) const;

    CardType getType() const;

    int getValue() const;

    std::string toString() const;

private:
    CardType type;
    int value;
};

#endif // CARD_H
