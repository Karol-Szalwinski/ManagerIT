<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PictureType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('file', FileType::class, array('label' => 'Dodaj obrazek poglądowy JPG, PNG'))
            ->add('type', 'choice', array(
                'choices' => array(
                    'Pogladowe' => 'Poglądowe',
                    'Rzeczywiste' => 'Rzeczywiste',
                ),
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Wybierz typ zdjęcia'
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Picture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_picture';
    }


}
