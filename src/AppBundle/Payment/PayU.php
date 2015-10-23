<?php

namespace AppBundle\Payment;

class PayU extends Payment implements PaymentGatewayInterface
{
    const DEFAULT_EXCHANGE_RATE = 'TRY';

    const EXCHANGE_RATE_DIFF = '1.12';

    public function checkCurrency() {
        //
    }

    public function pay() {
        return true;
    }
}