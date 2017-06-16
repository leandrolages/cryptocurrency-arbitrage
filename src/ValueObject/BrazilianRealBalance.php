<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

class BrazilianRealBalance extends FiatBalance
{
    /**
     * @inheritDoc
     */
    public function getSymbol()
    {
        return 'BRL';
    }
}