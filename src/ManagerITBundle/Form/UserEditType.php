<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Util\LegacyFormHelper;

class UserEditType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $permissions = array(
            'ROLE_USER' => 'Użytkownik',
            'ROLE_BOSS' => 'Szef',
            'ROLE_ADMIN' => 'Administrator'
        );

        $gender = array(
            'Female' => 'Kobieta ',
            'Male' => 'Mężczyzna '
        );
        $builder
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('name')
            ->add('roles', 'choice', array(
                    'label' => 'Roles',
                    'choices' => $permissions,
                    'multiple' => true,
                    'expanded' => true
                )
            )
            ->add('usersurname')
            ->add('job')
            ->add('departament', 'entity', [
                'class' => 'ManagerITBundle:Departament',
                'choice_label' => 'name']);;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_user';
    }

}
