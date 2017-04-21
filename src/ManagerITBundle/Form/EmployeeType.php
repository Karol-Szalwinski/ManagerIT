<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
                ->add('surname')
                ->add('sex', 'choice', array(
                    'choices' => array(
                        'Female' => 'Kobieta ',
                        'Male' => 'Mężczyzna ',      
                    ),
                    'expanded' => true,
                    'multiple' => false,
                ))
                ->add('phone')
                ->add('email')
                ->add('job')
                ->add('departament', 'entity', [
                    'class' => 'ManagerITBundle:Departament',
                    'choice_label' => 'name']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Employee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'manageritbundle_employee';
    }

}
