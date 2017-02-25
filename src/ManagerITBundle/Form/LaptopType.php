<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaptopType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
                ->add('model')
                ->add('type')
                ->add('manufacturer')
                ->add('cpu')
                ->add('ram')
                ->add('hdd', 'text', [
                    'required' => false,
                ])
                ->add('sdd', 'text', [
                    'required' => false,
                ])
                ->add('drive', 'text', [
                    'required' => false,
                ])
                ->add('powerSupply')
                ->add('battery')
                ->add('screen')
                ->add('os', 'text', [
                    'required' => false,
                ])
                ->add('ipAddress', 'text', [
                    'required' => false,
                ])
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
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Laptop'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'manageritbundle_laptop';
    }

}
