<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LaptopType extends AbstractType
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
            ->add('battery')
            ->add('screenSize', 'choice', array(
                'choices' => array(
                    10 => '10 cali ',
                    11 => '11 cali ',
                    12 => '12 cali ',
                    13 => '13 cali ',
                    14 => '14 cali ',
                    15 => '15 cali ',
                    16 => '16 cali ',
                    17 => '17 cali ',
                    18 => '18 cali ',
                    19 => '19 cali ',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('screenType', 'choice', array(
                'choices' => array(
                    'oled' => 'oled',
                    'led' => 'led',
                    'lcd' => 'lcd',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('battery')
            ->add('location')
            ->add('os', EntityType::class, [
                'class' => 'ManagerITBundle:Os',
                'choice_label' => 'name',
                'multiple' => false,
            ]);

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
