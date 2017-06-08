<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class CurrencyBalance
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue() : float
    {
        return $this->value;
    }

    public function convertTo(CurrencyBalance $currency) : float
    {
        return $this->value * $currency->getValue();
    }
}
