<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\PaymentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        $paymentForm = $this->createForm(new PaymentFormType());

        return array(
            'form' => $paymentForm->createView()
        );
    }
}
