<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DesktopRamType extends AbstractType
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
                    '0.5' => '512 MB',
                    '1' => '1 GB',
                ),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('type')
            ->add('busSpeed')
            ->add('casLatency')
            ->add('numberOfPins');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\DesktopRam'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_desktopram';
    }


}
