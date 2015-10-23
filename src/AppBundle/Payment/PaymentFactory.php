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
                //
            break;
            case 'payu':
                //
            break;
            case 'paytrek':
                //
            break;
        }

        return $instance;
    }

}