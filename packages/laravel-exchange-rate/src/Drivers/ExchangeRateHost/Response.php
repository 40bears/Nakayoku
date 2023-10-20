<?php

namespace AshAllenDesign\LaravelExchangeRates\Drivers\ExchangeRateHost;

use AshAllenDesign\LaravelExchangeRates\Interfaces\ResponseContract;

class Response implements ResponseContract
{
    public function __construct(private array $rawResponse)
    {
        // dd($rawResponse);
    }

    public function get(string $key): mixed
    {
        return data_get($this->rawResponse, $key);
        // return $this->rawResponse[$key];

    }

    public function rates(): array
    {
        return $this->get('quotes');
    }

    public function raw(): mixed
    {
        return $this->rawResponse;
    }
}
