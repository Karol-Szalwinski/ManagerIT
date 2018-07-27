<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PrinterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Laserowa' => 'Laserowa',
                    'Atramentowa' => 'Atramentowa',
                    'Termotransferowa' => 'Termotransferowa',
                    'Igłowa' => 'Igłowa',
                    'Inna' => 'Inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz rodzaj wydruku',
            ))
            ->add('factor', ChoiceType::class, array(
                'choices' => array(
                    'Sieciowa' => 'Sieciowa',
                    'Mobilna' => 'Mobilna',
                    'Wielofunkcyjny kombajn' => 'Wielofunkcyjny kombajn',
                    'Wielofunkcyjna' => 'Wielofunkcyjna',
                    'Jednostanowiskowa' => 'Jednostanowiskowa',
                    'Inna' => 'Inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz typ drukarki',
            ))
            ->add('color', ChoiceType::class, array(
                'choices' => array(
                    'Kolorowa' => 'Kolorowa',
                    'Monochromatyczna' => 'Monochromatyczna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz możliwosci kolorowego wydruku',
            ))
            ->add('brand', ChoiceType::class, array(
                'choices' => array(
                    'HP' => 'HP',
                    'Brother' => 'Brother',
                    'Ricoh' => 'Ricoh',
                    'Canon' => 'Canon',
                    'Lexmark' => 'Lexmark',
                    'Oki' => 'Oki',
                    'Inna' => 'Inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz producenta',
            ))
            ->add('model')
            ->add('series')
            ->add('powerSupply')
            ->add('macAddress')
            ->add('ipAddress')
            ->add('description')
            ->add('location')
            ->add('warrantyEndDate', 'date', array(
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->setAttributes(array(
                'novalidate' => 'novalidate',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Printer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_printer';
    }


}
