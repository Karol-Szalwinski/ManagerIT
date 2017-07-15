<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class LicenseType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('licenseKey')
            ->add('type', 'choice', array(
                'choices' => array(
                    'standard one-site' => 'Standardowa licencja jednostanowiskowa',
                    'standard site license' => 'Standardowa licencja wielostanowiskowa',
                    'cal' => 'Licencja na użytkownika - CAL',
                    'oem' => 'OEM',
                    'trial' => 'Trial',
                    'freeware' => 'Freeware',
                    'shareware' => 'Shareware',
                    'gnu' => 'GNU GPL',
                    'other' => 'inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz rodzaj licencji',
            ))
            ->add('brand')
            ->add('format', 'choice', array(
                'choices' => array(
                    'box' => 'Pudełko - BOX',
                    'cd' => 'CD-ROM',
                    'dvd' => 'DVD',
                    'usb' => 'USB',
                    'email' => 'Poczta E-mail',
                    'download' => 'Pobrany z internetu',
                    'other' => 'inna',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz rodzaj licencji',
            ))
            ->add('free')
            ->add('lifetime')
            ->add('numberOfSites')
            ->add('comment', TextareaType::class, array(
                'attr' => array('id' => 'autosize',
                    'class' => 'form-control'),
            ))
            ->add('expireDate', 'date', array(
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->add('purchaseDate', 'date', array(
                'widget' => 'single_text',
                'placeholder' => 'Select a value',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\License'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_license';
    }

}
