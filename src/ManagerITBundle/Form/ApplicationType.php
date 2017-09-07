<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', 'choice', array(
                'choices' => array(
                    'os' => 'System operacyjny',
                    'antivirus' => 'Antywirus',
                    'office' => 'Biurowe',
                    'special' => 'Specjalne',
                    'database' => 'Bazy danych',
                    'graphic' => 'Graficzny',
                    'other' => 'Inny',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz rodzaj programu',
            ))
            ->add('licenseType')
            ->add('developer')
            ->add('webpage')
            ->add('description')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Application'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_application';
    }


}
