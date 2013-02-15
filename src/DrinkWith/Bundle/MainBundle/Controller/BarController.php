<?php

namespace DrinkWith\Bundle\MainBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
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
     * @Route("/list.{_format}", name="_bar_list", defaults={"_format"="html"}, requirements={"_format"="html|json"})
     * @Template()
     *
     * @return array
     */
    public function listAction()
    {
        /* @var $repository \DrinkWith\Bundle\MainBundle\Entity\BarRepository */
        $repository = $this->getDoctrine()->getRepository('DrinkWithMainBundle:Bar');
        $request = $this->getRequest();
        if ($request->getRequestFormat() == "json") {

            return array('list' => $repository->listBar());
        }
        $qb = $repository->listBar(true);
        $paginator = new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        $paginator->setMaxPerPage(10);
        try {
            $request = $this->getRequest();
            $paginator->setCurrentPage($request->query->get('page', 1));
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return array(
            'paginator' => $paginator,
            'pagerfanta_opts' => array()
        );
    }

    /**
     * Find bar
     * @param int $id Bar Id
     *
     * @Route("/get/{id}.{_format}", name="_bar_get", defaults={"_format"="html"}, requirements={"_format"="html|json"})
     * @Template()
     *
     * @return array
     */
    public function getAction($id)
    {
        /* @var $repository \DrinkWith\Bundle\MainBundle\Entity\BarRepository */
        $repository = $this->getDoctrine()->getRepository('DrinkWithMainBundle:Bar');
        /* @var $bar \DrinkWith\Bundle\MainBundle\Entity\Bar */
        $bar = $repository->find($id);
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
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            throw new AccessDeniedException();
        }

        $currentUser = $this->container->get('security.context')->getToken()->getUser();

        $bar = new Bar();
        $form = $this->createForm(
            $this->get('bar.form.type'),
            $bar
        );

        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {
            $form->bind($request);

            $bar->setUser($currentUser);
            if ($form->isValid()) {
                $b = $this->getDoctrine()
                ->getRepository('DrinkWithMainBundle:Bar')
                ->saveBar($bar);

                return $this->redirect($this->generateUrl('_bar_list'));
            }
        }

        return array(
            "form" => $form->createView()
        );
    }

}
