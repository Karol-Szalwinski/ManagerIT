<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SddType extends AbstractType
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
                    'PCIe card' => 'PCIe card',
                    '2,5"' => '2,5"',
                    'm.SATA' => 'm.SATA',
                    'M.2' => 'M.2',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz obudowę',
            ))
            ->add('interface', 'choice', array(
                'choices' => array(
                    'SATA III' => 'SATA III',
                    'SAS' => 'SAS',
                    'PCIe' => 'PCIe',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz złącze',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Sdd'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_sdd';
    }


}
