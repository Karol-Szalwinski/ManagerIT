<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TabletType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('brand')
            ->add('model')
            ->add('serial')
            ->add('imei')
            ->add('cpu')
            ->add('ram')
            ->add('rom')
            ->add('modem')
            ->add('screenSize')
            ->add('os', 'choice', array(
                'choices' => array(
                    'Android' => 'Android',
                    'Windows' => 'Windows',
                    'other' => 'inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz system operacyjny',
            ))
            ->add('color')
            ->add('description')
            ->setAttributes(array(
                'novalidate' => 'novalidate',
            ));;
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
