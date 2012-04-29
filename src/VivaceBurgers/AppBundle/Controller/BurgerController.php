<?php

namespace VivaceBurgers\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BurgerController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function listAction()
    {
        $burger_repo = $this->get('doctrine')->getRepository('VivaceBurgers\AppBundle\Entity\Hamburger');
        $burgers = $burger_repo->findAll();

        return array('burgers' => $burgers);
    }
}
