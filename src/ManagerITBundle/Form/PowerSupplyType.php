<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PowerSupplyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('model')
            ->add('series')
            ->add('brand')
            ->add('type', 'choice', array(
                'choices' => array(
                    'outside' => 'zewnętrzny',
                    'inside' => 'wewnętrzny',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz typ zasilacza',
            ))
            ->add('cooling', 'choice', array(
                'choices' => array(
                    'none' => 'brak',
                    'active' => 'aktywne',
                    'passive' => 'pasywne',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz typ chłodzenia',
            ))
            ->add('powerInWatt');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\PowerSupply'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_powersupply';
    }


}
