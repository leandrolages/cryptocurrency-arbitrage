<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

class BitcoinBalance extends CryptoBalance
{
    /**
     * @inheritDoc
     */
    public function getSymbol()
    {
        return 'BTC';
    }
}