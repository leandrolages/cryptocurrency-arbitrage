<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class Order
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var float
     */
    protected $value;

    /**
     * @param float $amount
     * @param float $value
     */
    public function __construct(float $amount, float $value)
    {
        $this->amount = $amount;
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getAmount() : float
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getValue() : float
    {
        return $this->value;
    }
}