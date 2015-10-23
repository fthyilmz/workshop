<?php

namespace AppBundle\Payment;

interface PaymentGatewayInterface
{
    public function checkCurrency();

    public function pay();

    public function sendVoucher();
}