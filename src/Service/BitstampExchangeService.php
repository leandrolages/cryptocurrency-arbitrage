<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Service;

use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\CryptoCurrencyBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatCurrencyBalance;

class BitstampExchangeService extends ExchangeService
{
    /**
     * @inheritDoc
     */
    public function withdraw() : FiatCurrencyBalance
    {
        return new FiatCurrencyBalance($this->fiatCurrencyBalance->getValue() - 0.9);
    }

    /**
     * @inheritDoc
     */
    public function transfer() : CryptoCurrencyBalance
    {
        return new CryptoCurrencyBalance($this->cryptoCurrencyBalance->getValue() * 0.999);
    }

    /**
     * @inheritDoc
     */
    public function buy(array $sellOrders) : CryptoCurrencyBalance
    {
        $net = $this->fiatCurrencyBalance->getValue()
    }

    /**
     * @inheritDoc
     */
    public function sell(array $buyOrders) : FiatCurrencyBalance
    {
        // TODO: Implement sell() method.
    }

}