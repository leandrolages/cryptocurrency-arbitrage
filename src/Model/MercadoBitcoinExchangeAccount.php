<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Model;

use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BitcoinBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BrazilianRealBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BuyOrder;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\CryptoBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\SellOrder;

class MercadoBitcoinExchangeAccount extends ExchangeAccount
{
    /**
     * @inheritDoc
     */
    public function withdraw() : FiatBalance
    {
        $feeDiscounted = 1 - 0.0199;
        $funds = ($this->fiatBalance->getCurrency() * $feeDiscounted) - 2.9;
        $this->fiatBalance->resetFunds();

        return new BrazilianRealBalance($funds);
    }

    /**
     * @inheritDoc
     */
    public function transfer() : CryptoBalance
    {
        $funds = $this->cryptoBalance->getCurrency() * 0.00085800;
        $this->cryptoBalance->resetFunds();

        return new BitcoinBalance($funds);
    }

    /**
     * @inheritDoc
     */
    public function buy(SellOrder $sellOrder)
    {
        $fee = 0.007;
        $totalCrypto = ($this->fiatBalance->getCurrency() / $sellOrder->getValue()) * (1 - $fee);
        $this->fiatBalance->resetFunds();
        $this->cryptoBalance->addFunds($totalCrypto);
    }

    /**
     * @inheritDoc
     */
    public function sell(BuyOrder $buyOrder)
    {
        $fee = 0.007;
        $totalFiat = ($this->cryptoBalance->getCurrency() * $buyOrder->getValue()) * (1 - $fee);
        $this->cryptoBalance->resetFunds();
        $this->fiatBalance->addFunds($totalFiat);
    }
}