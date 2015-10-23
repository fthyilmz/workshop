<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Class PaymentFormType
 * @package AppBundle\Form\Type
 */
class PaymentFormType extends AbstractType
{

    /**
     * Build offer create form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text',
                [
                    'required' => true
                ]
            )
            ->add(
                'paymentGateway',
                'choice',
                [
                    'choices' => [],
                    'constraints' => array(
                        new NotBlank(),
                    )
                ]
            )
            ->add(
                'value',
                'number',
                [
                    'required' => true,
                    'constraints' => array(
                        new Type('numeric'),
                    )
                ]
            )
            ->add(
                'currency',
                'choice',
                [
                    'choices' => [
                        'EUR' => 'EUR',
                        'TRY' => 'TRY',
                        'USD' => 'USD'
                    ]
                ]
            )
            ->add(
                'submit',
                'submit',
                [
                    'label' => 'pay'
                ]
            )
        ;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'payment';
    }
}