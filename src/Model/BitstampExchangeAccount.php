<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Model;

use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BitcoinBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BuyOrder;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\CryptoBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\EuroBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\SellOrder;

class BitstampExchangeAccount extends ExchangeAccount
{
    /**
     * @inheritDoc
     */
    public function withdraw() : FiatBalance
    {
        $funds = $this->fiatBalance->getCurrency() - 0.9;
        $this->fiatBalance->resetFunds();

        return new EuroBalance($funds);
    }

    /**
     * @inheritDoc
     */
    public function transfer() : CryptoBalance
    {
        $funds = $this->cryptoBalance->getCurrency() * 0.999;
        $this->cryptoBalance->resetFunds();

        return new BitcoinBalance($funds);
    }

    /**
     * @inheritDoc
     */
    public function buy(SellOrder $sellOrder)
    {
        $fee = 0.0025;
        $totalCrypto = ($this->fiatBalance->getCurrency() / $sellOrder->getValue()) * (1 - $fee);
        $this->fiatBalance->resetFunds();
        $this->cryptoBalance->addFunds($totalCrypto);
    }

    /**
     * @inheritDoc
     */
    public function sell(BuyOrder $buyOrder)
    {
        $fee = 0.0025;
        $totalFiat = ($this->cryptoBalance->getCurrency() * $buyOrder->getValue()) * (1 - $fee);
        $this->cryptoBalance->resetFunds();
        $this->fiatBalance->addFunds($totalFiat);
    }
}