<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

class EuroBalance extends FiatBalance
{
    /**
     * @inheritDoc
     */
    public function getSymbol()
    {
        return 'EUR';
    }

}