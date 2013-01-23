<?php

namespace DrinkWith\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DrinkWith\Bundle\MainBundle\Entity\Bar;

/**
 * Default controller
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 */
class BarController extends Controller
{
    /**
     * @Route("/", name="_bar_home")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return array('name' => "toto");
    }

    /**
     * @Route("/add", name="_bar_add")
     * @Template()
     *
     * @return array
     */
    public function addAction()
    {
        //phpinfo();
        $bar = new Bar();
        $form = $this->createForm(
            $this->get('bar.form.type'),
            $bar
        );

        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {
            $form->bind($request);
            if ($form->isValid()) {
                $b = $this->getDoctrine()
                ->getRepository('DrinkWithMainBundle:Bar')
                ->saveBar($bar);
            }

        }

        return array(
            "form" => $form->createView()
        );
    }

}
