<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('brand')
            ->add('model')
            ->add('serial')
            ->add('imei')
            ->add('cpu')
            ->add('ram')
            ->add('rom')
            ->add('modem')
            ->add('screenSize',FloatType::class, [
                'attr' => [
                    'min'  => 1,
                    'max'  => 8,
                    'step' => 0.05
                ]
            ])
            ->add('os', 'choice', array(
                'choices' => array(
                    'Android' => 'Android',
                    'Windows' => 'Windows',
                    'other' => 'inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz system operacyjny',
            ))
            ->add('color')
            ->add('description')
            ->add('warrantyEndDate', 'date', array(
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->add('status', 'choice', array(
                'choices' => array(
                    'Nowy' => 'Nowy',
                    'W użyciu' => 'W użyciu',
                    'W naprawie' => 'W naprawie',
                    'Zezłomowany' => 'Zezłomowany',
                    'W magazynie' => 'W magazynie'
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz status urządzenia'
            ))
            ->setAttributes(array(
                'novalidate' => 'novalidate',
            ));

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Phone'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_phone';
    }


}
