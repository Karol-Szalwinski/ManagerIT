<?php
namespace ManagerITBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('base64_decode', array($this, 'base64DecodeFilter')),
        );
    }

    public function base64DecodeFilter($password)
    {
        $decodedPassword = base64_decode(str_rot13($password));

        return $decodedPassword;
    }
}