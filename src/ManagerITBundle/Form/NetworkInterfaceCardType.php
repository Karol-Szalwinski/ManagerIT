<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkInterfaceCardType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('model')
            ->add('series')
            ->add('brand')
            ->add('standard', 'choice', array(
                'choices' => array(
                    'Ethernet' => 'Ethernet',
                    'Wi-Fi' => 'Wi-Fi',
                    'FDDI' => 'FDDI'
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('interface', 'choice', array(
                'choices' => array(
                    'Zintegrowana' => 'Zintegrowana',
                    'PCI' => 'PCI',
                    'PCI-Express' => 'PCI-Express',
                    'USB' => 'USB',
                    'PCIMCIA' => 'PCIMCIA',
                    'ExpressCard' => 'ExpressCard',
                    'USB' => 'USB',

                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('ipv4')
            ->add('macAddress')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\NetworkInterfaceCard'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_networkinterfacecard';
    }


}
