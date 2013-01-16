<?php

namespace DrinkWith\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default User Controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return array('name' => "toto");
    }

    /**
     * @Template()
     *
     * @return array
     */
    public function menuAction()
    {
        return array('name' => "toto");
    }

}
