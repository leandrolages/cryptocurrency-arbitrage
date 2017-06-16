<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class PriceQuote extends Currency
{
    /**
     * @param Currency $currency
     * @throws \Exception
     * @return Currency
     */
    public function convertTo(Currency $currency) : Currency
    {
        if ($currency->getSymbol() === $this->getSymbol()) {
            throw new \Exception('Cannot convert currency. It is already converted.');
        }

        return $currency->createNewCurrency($this->getValue() * $currency->getValue());
    }
}
