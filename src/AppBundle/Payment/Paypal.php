<?php

namespace AppBundle\Payment;

class Paypal extends Payment implements PaymentGatewayInterface
{
    const DEFAULT_EXCHANGE_RATE = 'EUR';

    const EXCHANGE_RATE_DIFF = '1.08';

    public function checkCurrency() {
        //
    }

    public function pay() {
        return true;
    }
}