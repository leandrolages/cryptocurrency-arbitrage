<?php

namespace LeandroLages\CryptoCurrency\Arbitrage\Service;

use LeandroLages\CryptoCurrency\Arbitrage\Model\ExchangeAccount;
use LeandroLages\CryptoCurrency\Arbitrage\ValueObject\FiatBalance;

class SearchArbitrageService
{
    /**
     * @var ExchangeAccount
     */
    protected $sourceExchange;

    /**
     * @var ExchangeAccount
     */
    protected $targetExchange;

    /**
     * @param ExchangeAccount $sourceExchange
     * @param ExchangeAccount $targetExchange
     */
    public function __construct(ExchangeAccount $sourceExchange, ExchangeAccount $targetExchange)
    {
        $this->sourceExchange = $sourceExchange;
        $this->targetExchange = $targetExchange;
    }

    /**
     * @param FiatBalance $balance
     * @return FiatBalance
     */
    public function run(FiatBalance $balance) : FiatBalance
    {

    }

}