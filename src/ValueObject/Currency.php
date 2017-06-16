<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

abstract class Currency
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

    /**
     * @return Currency
     */
    public function clone() : Currency
    {
        return $this->createNewCurrency($this->value);
    }

    /**
     * @return string
     */
    abstract public function getSymbol();

    /**
     * @param float $newValue
     *
     * @return Currency
     */
    abstract protected function createNewCurrency(float $newValue) : Currency;
}
