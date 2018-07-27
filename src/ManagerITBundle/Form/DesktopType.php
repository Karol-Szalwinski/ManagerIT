<?php

namespace ManagerITBundle\Form;

use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class DesktopType extends AbstractType
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
            ->add('caseType', EntityType::class, [
                'class' => 'ManagerITBundle:ComputerFormFactor',
                'choice_label' => 'name',
                'multiple' => false,
            ])
            ->add('os', EntityType::class, [
                'class' => 'ManagerITBundle:Os',
                'choice_label' => 'name',
                'multiple' => false,
            ])
            ->add('location')
            ->add('warrantyEndDate', 'date', array(
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->setAttributes(array(
                'novalidate' => 'novalidate',
            ));
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
