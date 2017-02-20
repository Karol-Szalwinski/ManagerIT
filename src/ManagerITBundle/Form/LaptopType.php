<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaptopType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('model')->add('type')->add('manufacturer')->add('cpu')->add('ram')->add('hdd')->add('sdd')->add('drive')->add('powerSupply')->add('battery')->add('screen')->add('os')->add('ipAddress')->add('macAddress')->add('picture')->add('price')->add('purchaseDate')->add('addDate')->add('licenses')->add('employees')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Laptop'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_laptop';
    }


}
