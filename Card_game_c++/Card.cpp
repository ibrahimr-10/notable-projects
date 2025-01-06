#include "Card.h"
#include <sstream>

Card::Card(CardType type, int value) : type(type), value(value) {}

Card::Card() : type(CardType::POWER_PLUS), value(1) {}

bool Card::operator==(const Card& other) const {
    return type == other.type && value == other.value;
}

CardType Card::getType() const {
    return type;
}

int Card::getValue() const {
    return value;
}

std::string Card::toString() const {
    std::stringstream ss;
    switch (type) {
    case CardType::POWER_PLUS:
        ss << "Power plus " << value;
        break;
    case CardType::POWER_MINUS:
        ss << "Power minus " << value;
        break;
    case CardType::STEAL:
        ss << "Steal " << value;
        break;
    default:
        ss << "";
        break;
    }
    return ss.str();
}
