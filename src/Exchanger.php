<?php

namespace Yaromir\ShopPackage;
use Illuminate\Support\Facades\Http;

class Exchanger
{
    private $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function getExchangeRate()
    {
        $this->result = Http::get('https://api.exchangerate.host/latest')->json();

        return $this;
    }

    public function result()
    {
        return $this->result;
    }

    public function __toString()
    {
        return json_encode($this->result);
    }
}
