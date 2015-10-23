<?php

namespace AppBundle\Payment;

class Paypal extends Payment implements PaymentGatewayInterface
{
    const DEFAULT_EXCHANGE_RATE = 'EUR';

    const EXCHANGE_RATE_DIFF = '1.08';

    public function checkCurrency() {
        if (self::DEFAULT_EXCHANGE_RATE != $this->paymentData['currency']) {
            $this->paymentData['value'] *= self::EXCHANGE_RATE_DIFF;
        }
    }

    public function pay() {
        return true;
    }
}