<?php

namespace DrinkWith\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="_home")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/terms", name="_terms")
     * @Template()
     *
     * @return array
     */
    public function termsAction()
    {
        return array();
    }

    /**
     * @Route("/contact", name="_contact")
     * @Template()
     *
     * @return array
     */
    public function contactAction()
    {
        return array();
    }
}
