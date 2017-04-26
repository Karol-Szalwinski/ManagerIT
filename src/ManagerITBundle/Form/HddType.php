<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HddType extends AbstractType
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
            ->add('capacity', 'choice', array(
                'choices' => array(
                    '64' => '64 GB',
                    '100' => '100 GB',
                    '160' => '160 GB',
                    '250' => '250 GB',
                    '500' => '500 GB',
                    '750' => '750 GB',
                    '1024' => '1 TB',
                    '2048' => '2 GB',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz pojemność',
            ))
            ->add('formFactor', 'choice', array(
                'choices' => array(
                    '3,5"' => '3,5"',
                    '2,5"' => '2,5"',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz obudowę',
            ))
            ->add('interface', 'choice', array(
                'choices' => array(
                    'SATA I' => 'SATA I',
                    'SATA II' => 'SATA II',
                    'SATA III' => 'SATA III',
                    'SAS' => 'SAS',
                    'SERIAL ATA' => 'SERIAL ATA',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz złącze',
            ))
            ->add('rotationSpeedRpm', 'choice', array(
                'choices' => array(
                    '5400' => '5400',
                    '5900' => '5900',
                    '7200' => '7200',
                    '10000' => '10 000',
                    '10500' => '10 500',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz RPM',
            ))
            ->add('cache', 'choice', array(
                'choices' => array(
                    '8' => '8 MB',
                    '16' => '16 MB',
                    '32' => '32 MB',
                    '64' => '64 MB',
                    '128' => '128 MB',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz RPM',
            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Hdd'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_hdd';
    }


}
