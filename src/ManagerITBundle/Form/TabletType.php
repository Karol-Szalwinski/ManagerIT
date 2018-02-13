<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TabletType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('brand')->add('model')->add('serial')->add('cpu')->add('ram')->add('rom')->add('modem')->add('screenSize')->add('os')->add('pin')->add('pinScreen')->add('color')->add('description')->add('sim')->add('employee')->add('addDate')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Tablet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_tablet';
    }


}
