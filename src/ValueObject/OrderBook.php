<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\ValueObject;

class OrderBook
{
    /**
     * @var BuyOrder[]
     */
    protected $buyOrders;

    /**
     * @var SellOrder[]
     */
    protected $sellOrders;

    /**
     * @param BuyOrder[] $buyOrders
     * @param SellOrder[] $sellOrders
     */
    public function __construct(array $buyOrders, array $sellOrders)
    {
        $this->buyOrders = $buyOrders;
        $this->sellOrders = $sellOrders;
    }

    /**
     * @return BuyOrder[]
     */
    public function getBuyOrders()
    {
        return $this->buyOrders;
    }

    /**
     * @return SellOrder[]
     */
    public function getSellOrders()
    {
        return $this->sellOrders;
    }
}