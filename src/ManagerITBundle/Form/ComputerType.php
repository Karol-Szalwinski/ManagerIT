<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComputerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('model')->add('formFactor')->add('brand')->add('series')->add('powerSupply')->add('ipAddresss')->add('macAddress')->add('price')->add('purchaseDate')->add('addDate')->add('battery')->add('screenSize')->add('screenType')->add('cpu')->add('caseType')->add('os')->add('pictures')->add('licenses')->add('employees')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Computer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_computer';
    }


}
