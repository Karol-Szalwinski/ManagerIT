<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpticalDriveType extends AbstractType
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
                    'CD-ROM' => 'CD-ROM',
                    'CD-RW' => 'CD-RW',
                    'DVD-ROM' => 'DVD-ROM',
                    'DVD-RW' => 'DVD-RW',
                    'BLUE-RAY' => 'BLUE-RAY',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz typ',
            ))
            ->add('interface', 'choice', array(
                'choices' => array(
                    'SATA III' => 'SATA III',
                    'IDE' => 'IDE',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz złącze',
            ))
            ->add('factoryFormat', 'choice', array(
                'choices' => array(
                    'standard' => 'standard',
                    'slim' => 'slim',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz obudowę',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\OpticalDrive'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_opticaldrive';
    }


}
