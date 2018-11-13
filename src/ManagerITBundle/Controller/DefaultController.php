<?php

namespace ManagerITBundle\Controller;

use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statistics = $em->getRepository('ManagerITBundle:Statistic')->getLast();
        $statistic = $statistics[0];


        return $this->render('main/index_main.html.twig', array(
            'statistic' => $statistic,
        ));
    }
}
