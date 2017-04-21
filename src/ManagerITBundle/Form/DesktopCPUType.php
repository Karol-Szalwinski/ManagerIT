<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DesktopCPUType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('manufacturer', 'choice', array(
                    'choices' => array(
                        'Intel' => 'Intel',
                        'AMD' => 'AMD',      
                    ),
                    'expanded' => true,
                    'multiple' => false,
                ))
                ->add('baseFrequency')
                ->add('maxTurboFrequency')
                ->add('numberOfCores')
                ->add('numberOfThreads')
                ->add('casheMB')
                ->add('tDP')
                ->add('gPU')
                ->add('lithographyNM')
                ->add('launchDate', 'date', array(
                    'widget' => 'single_text',
                    'placeholder' => 'Select a value',
                    // do not render as type="date", to avoid HTML5 date pickers
                    'html5' => false,
                    // add a class that can be selected in JavaScript
                    'attr' => ['class' => 'js-datepicker'],
                ))
                ->add('sockets')
                ->add('generation')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\DesktopCPU'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_desktopcpu';
    }


}
