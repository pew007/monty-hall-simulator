<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/simulate/{attempts}", name="simulation", options={"expose"=true})
     * @param $attempts
     * @return Response
     */
    public function simulateAction($attempts)
    {

        return $this->render(':default:_simulation_results.html.twig');
    }
}
