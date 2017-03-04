<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ManagerITBundle\Entity\Laptop;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LaptopConnectLicenseType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $laptop = $options['attr']['laptop'];
        $builder
                ->add('licenses', EntityType::class, [
                    'class' => 'ManagerITBundle:License',
                    'choice_label' => 'name',
//                    'expanded' => true,
                     'multiple' => true, 
//                    'query_builder' => function (EntityRepository $er) use ($laptop) {
//                        return $er->createQueryBuilder('license')
//                                ->leftJoin('license.laptops', 'laptop')
//                                ->where('laptop <> :laptop')
//                                ->orWhere('laptop is NULL')
//                                ->setParameter('laptop', $laptop);
//                    },
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
