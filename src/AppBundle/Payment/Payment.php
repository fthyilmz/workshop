<?php

namespace AppBundle\Payment;

abstract class Payment
{

    public $paymentData;

    protected $mailer;

    protected $template;

    function __construct(\Swift_Mailer $mailer, \Twig_Environment $environment)
    {
        $this->mailer = $mailer;
        $this->template = $environment;
    }

    public function sendVoucher() {
        // Mail
    }

}
