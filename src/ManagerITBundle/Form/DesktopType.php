<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class DesktopType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('model')
            ->add('type')
            ->add('manufacturer')
            ->add('cpu', EntityType::class, [
                'class' => 'ManagerITBundle:DesktopCPU',
                'choice_label' => 'name',
                'multiple' => false,
            ])
            ->add('rams', EntityType::class, [
                'class' => 'ManagerITBundle:DesktopRam',
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('hdds', EntityType::class, [
                'class' => 'ManagerITBundle:Hdd',
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('ssds', EntityType::class, [
                'class' => 'ManagerITBundle:Ssd',
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('drive')
            ->add('powerSupply')
            ->add('caseType')
            ->add('os')
            ->add('ipAddress')
            ->add('macAddress')
            ->add('price')
            ->add('purchaseDate', 'date', [
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
            ])

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Desktop'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_desktop';
    }


}
