<?php

namespace DrinkWith\Bundle\MainBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
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
     * Find bar
     * @param int $id Bar Id
     *
     * @Route("/get/{id}.{_format}", name="_bar_find", defaults={"_format"="html"}, requirements={"_format"="html|json"})
     * @Template()
     *
     * @return array
     */
    public function getAction($id)
    {
        /* @var $bar \DrinkWith\Bundle\MainBundle\Entity\Bar */
        $bar = $this->getDoctrine()->getRepository('DrinkWithMainBundle:Bar')->find($id);
        if ($bar === null) {
            throw new NotFoundHttpException();
        }

        return array("bar" => $bar);
    }


    /**
     * @Route("/count.{_format}", name="_bar_count", defaults={"_format"="json"})
     * @Cache(smaxage="15")
     * @Template
     *
     * @return array
     */
    public function countAction()
    {
        $count = $this->getDoctrine()->getRepository('DrinkWithMainBundle:Bar')->count();

        return array('count' => $count);
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
