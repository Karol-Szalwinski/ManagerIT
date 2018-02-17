<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
