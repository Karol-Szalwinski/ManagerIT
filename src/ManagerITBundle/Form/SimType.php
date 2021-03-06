<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SimType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('pin')
            ->add('pin2')
            ->add('puk')
            ->add('puk2')
            ->add('operator', 'choice', array(
                'choices' => array(
                    'Orange' => 'Orange',
                    'Plus' => 'Plus GSM',
                    'T-mobile' => 'T-mobile',
                    'Play' => 'Play',
                    'Inna' => 'Inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz sieć',
            ))
            ->add('monthlyfee', NumberType::class, array(
                'required' => true,
                'scale' => 2,
                'attr' => array(
                    'min' => 0,
                    'max' => 50000,
                    'step' => 0.01,
                    'placeholder' => '0.00'
                ),
            ))
            ->add('status', 'choice', array(
                'choices' => array(
                    'W użyciu' => 'W użyciu',
                    'W magazynie' => 'W magazynie',
                    'Zlikwidowana' => 'Zlikwidowana'
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz status urządzenia'
            ))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Sim'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_sim';
    }


}
