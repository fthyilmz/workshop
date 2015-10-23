<?php

namespace AppBundle\Payment;

class Paytrek extends Payment implements PaymentGatewayInterface
{
    const DEFAULT_EXCHANGE_RATE = 'USD';

    const EXCHANGE_RATE_DIFF = '1.10';

    public function checkCurrency() {
        //
    }

    public function pay() {
        return true;
    }
}