<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Service;

use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\BuyOrder;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\CryptoCurrencyBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatCurrencyBalance;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\SellOrder;

abstract class ExchangeService
{
    /**
     * @var FiatCurrencyBalance
     */
    protected $fiatCurrencyBalance;

    /**
     * @var CryptoCurrencyBalance
     */
    protected $cryptoCurrencyBalance;

    /**
     * @param FiatCurrencyBalance $fiatCurrencyBalance
     * @param CryptoCurrencyBalance $cryptoCurrencyBalance
     */
    public function __construct(FiatCurrencyBalance $fiatCurrencyBalance, CryptoCurrencyBalance $cryptoCurrencyBalance)
    {
        $this->fiatCurrencyBalance = $fiatCurrencyBalance;
        $this->cryptoCurrencyBalance = $cryptoCurrencyBalance;
    }

    /**
     * @param FiatCurrencyBalance $currency
     *
     * @return void
     */
    public function deposit(FiatCurrencyBalance $currency) {
        $this->fiatCurrencyBalance = new FiatCurrencyBalance(
            $this->fiatCurrencyBalance->getValue() + $currency->getValue()
        );
    }

    /**
     * @return FiatCurrencyBalance
     */
    abstract public function withdraw() : FiatCurrencyBalance;

    /**
     * @param CryptoCurrencyBalance $currency
     *
     * @return void
     */
    public function receive(CryptoCurrencyBalance $currency) {
        $this->cryptoCurrencyBalance = new CryptoCurrencyBalance(
            $this->cryptoCurrencyBalance->getValue() + $currency->getValue()
        );
    }

    /**
     * @return CryptoCurrencyBalance
     */
    abstract public function transfer() : CryptoCurrencyBalance;

    /**
     * @param SellOrder[] $sellOrders
     *
     * @return CryptoCurrencyBalance
     */
    abstract public function buy(array $sellOrders) : CryptoCurrencyBalance;

    /**
     * @param BuyOrder[] $buyOrders
     *
     * @return FiatCurrencyBalance
     */
    abstract public function sell(array $buyOrders) : FiatCurrencyBalance;
}