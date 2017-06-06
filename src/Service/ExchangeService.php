<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Service;

interface ExchangeService
{
    public function deposit(float $amount) : float;
    public function withdraw() : float;
    public function receive(float $amount);
    public function transfer() : float;
    public function buy();
    public function sell();
}