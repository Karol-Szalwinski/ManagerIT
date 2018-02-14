<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                'choices' => array(
                    'Faktura' => 'Faktura',
                    'Paragon' => 'Paragon',
                    'Inny' => 'Inny',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz rodzaj dokumentu',
            ))
            ->add('subject', 'choice', array(
                'choices' => array(
                    'Zakup' => 'Zakup',
                    'Naprawa' => 'Naprawa',
                    'Upgrate' => 'Upgrade',
                    'Inny' => 'Inny',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz przedmiot dokumentu',
            ))
            ->add('number')
            ->add('sellerName')
            ->add('sellerPhoneNumber')
            ->add('price', NumberType::class, array(
                'required' => true,
                'scale' => 2,
                'attr' => array(
                    'min' => 0,
                    'max' => 50000,
                    'step' => 0.01,
                    'placeholder' => '0.00'
                ),
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
            'data_class' => 'ManagerITBundle\Entity\Document'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_document';
    }


}
