<?php

namespace AppBundle\Payment;

use Symfony\Component\DependencyInjection\Container;

class PaymentFactory
{

    protected $container;

    function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function create($paymentData)
    {
        $instance = null;
        switch($paymentData['paymentGateway']){
            case 'paypal':
                $instance = $this->container->get('payment.paypal');
            break;
            case 'payu':
                $instance = $this->container->get('payment.payu');
            break;
            case 'paytrek':
                $instance = $this->container->get('payment.paytrek');
            break;
        }

        $instance->paymentData = $paymentData;

        return $instance;
    }

}