<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Model;

use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BuyOrder;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\CryptoBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\SellOrder;

abstract class ExchangeAccount
{
    /**
     * @var FiatBalance
     */
    protected $fiatBalance;

    /**
     * @var CryptoBalance
     */
    protected $cryptoBalance;

    /**
     * ExchangeAccount constructor.
     * @param FiatBalance $fiatBalance
     * @param CryptoBalance $cryptoBalance
     */
    public function __construct(FiatBalance $fiatBalance, CryptoBalance $cryptoBalance)
    {
        $this->fiatBalance = $fiatBalance;
        $this->cryptoBalance = $cryptoBalance;
    }

    /**
     * @param FiatBalance $fiatBalance
     *
     * @return void
     */
    public function deposit(FiatBalance $fiatBalance) {
        $this->fiatBalance->addFunds($fiatBalance->getCurrency());
    }

    /**
     * @return FiatBalance
     */
    abstract public function withdraw() : FiatBalance;

    /**
     * @param CryptoBalance $cryptoBalance
     *
     * @return void
     */
    public function receive(CryptoBalance $cryptoBalance) {
        $this->cryptoBalance->addFunds($cryptoBalance->getCurrency());
    }

    /**
     * @return CryptoBalance
     */
    abstract public function transfer() : CryptoBalance;

    /**
     * @param SellOrder $sellOrder
     */
    abstract public function buy(SellOrder $sellOrder);

    /**
     * @param BuyOrder $buyOrder
     */
    abstract public function sell(BuyOrder $buyOrder);
}