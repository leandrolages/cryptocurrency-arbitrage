<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Service;

abstract class BaseExchangeService implements ExchangeService
{
    protected $currencyBalance = 0.00;
    protected $cryptoCurrencyBalance = 0.00;
}