<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\PaymentFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        $paymentForm = $this->createForm(new PaymentFormType($this->getParameter('payment')));

        return array(
            'form' => $paymentForm->createView()
        );
    }


    /**
     * @Route("/", name="create")
     * @Method({"POST"})
     * @Template("@App/Default/index.html.twig")
     */
    public function createAction(Request $request)
    {
        $paymentForm = $this->createForm(new PaymentFormType($this->getParameter('payment')));

        $paymentForm->handleRequest($request);

        if ($paymentForm->isValid()) {

            $paymentData = $paymentForm->getData();

            $payment = $this->get('factory.payment')->create($paymentData);

            $payment->checkCurrency();

            if ($payment->pay()) {
                $payment->sendVoucher();
            }

            return $this->redirectToRoute('homepage');
        }

        return array(
            'form' => $paymentForm->createView()
        );
    }
}
