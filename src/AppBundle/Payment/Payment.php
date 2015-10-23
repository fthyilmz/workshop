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

        $mail = \Swift_Message::newInstance()
            ->setSubject('Payment Successful')
            ->setFrom('fthyilmz@gmail.com')
            ->setTo('fatih.yilmaz@tasit.com')
            ->setBody(
                $this->template->render('@App/Default/mail.html.twig', ['payment' => $this->paymentData]),
                'text/html'
            )
        ;

        $this->mailer->send($mail);
    }

}
