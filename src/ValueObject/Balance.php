<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class Balance extends Currency
{
    public function addFunds(Currency $amount)
    {
        if ($amount->getSymbol() !== $this->getSymbol()) {
            throw new \Exception('Cannot add funds from different currencies.');
        }

        $this->value += $amount->getValue();
    }

    public function resetFunds()
    {
        return $this->value = 0;
    }
}
