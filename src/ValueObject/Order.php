<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class Order
{
    /**
     * @var CryptoBalance
     */
    protected $cryptoBalance;

    /**
     * @var PriceQuote
     */
    protected $priceQuote;

    /**
     * @param CryptoBalance $cryptoBalance
     * @param PriceQuote $priceQuote
     */
    public function __construct(CryptoBalance $cryptoBalance, PriceQuote $priceQuote)
    {
        $this->cryptoBalance = $cryptoBalance->clone();
        $this->priceQuote = $priceQuote;
    }

    /**
     * @return float
     */
    public function getBalanceValue() : float
    {
        return $this->cryptoBalance->getValue();
    }
}