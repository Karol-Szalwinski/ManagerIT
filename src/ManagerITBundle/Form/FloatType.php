<?php

// src/AppBundle/Form/Type/FloatType.php

namespace ManagerITBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FloatType extends AbstractType
{
    public function getParent()
    {
        return NumberType::class;
    }
}