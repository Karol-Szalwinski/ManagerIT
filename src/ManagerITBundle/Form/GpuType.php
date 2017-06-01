<?php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GpuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('chipset')
            ->add('series')
            ->add('brand')
            ->add('memorySize')
            ->add('memoryType', 'choice', array(
                'choices' => array(
                    'DDR2' => 'DDR2',
                    'DDR3' => 'DDR3',
                    'DDR5' => 'DDR5'
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('compatiableSlotPort', 'choice', array(
                'choices' => array(
                    'zintegrowana w cpu' => 'zintegrowana w cpu',
                    'zintegrowana na płycie głównej' => 'zintegrowana na płycie głównej',
                    'PCI' => 'PCI',
                    'PCI Express x16' => 'PCI Express x16',
                    'PCI Express x8' => 'PCI Express x8',
                    'AGP' => 'AGP',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('cooling', 'choice', array(
                'choices' => array(
                    'Aktywne' => 'aktywne ',
                    'Pasywne' => 'pasywne ',
                    'Nieoryginalne' => 'nieoryginalne '
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('monitorConnectors', 'choice', array(
                'choices' => array(
                    'HDMI ' => 'HDMI ',
                    'DVI ' => 'DVI ',
                    'Display Port ' => 'Display Port '
                ),
                'expanded' => true,
                'multiple' => false,
            ))

            ->add('powerConnectors', 'choice', array(
                'choices' => array(
                    'brak' => 'brak',
                    'PCIe 4 pin' => 'PCIe 4pin' ,
                    'PCIe 6 pin' => 'PCIe 6pin',
                    'PCIe 8 pin' => 'PCIe 8pin',
                    'PCIe 6 + 6 pin' => 'PCIe 6 + 6 pin',
                    'PCIe 6 + 8 pin' => 'PCIe 6 + 8 pin',
                    'PCIe 8 + 8 pin' => 'PCIe 8 + 8 pin',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('formFactor', 'choice', array(
                'choices' => array(
                    'karta  pci desktop' => 'karta  pci desktop ',
                    'zintegrowana desktopowa' => 'zintegrowana desktopowa ',
                    'zintegrowana laptop' => 'zintegrowana laptop ',
                    'zewnętrzna usb' => 'zewnętrzna usb',
                ),
                'expanded' => false,
                'multiple' => false,
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerITBundle\Entity\Gpu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manageritbundle_gpu';
    }


}
