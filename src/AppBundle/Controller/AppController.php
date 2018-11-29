<?php

namespace AppBundle\Controller;

use AppBundle\Lib\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $wins = 0;

        for ($i = 0; $i < $attempts; $i++) {
            $game = new Game();

            $game->pickADoor();
            $game->openADoor();
            $game->switchDoor();

            if ($game->win()) {
                $wins++;
            }
        }

        $losses         = $attempts - $wins;
        $templateParams = [
            'wins'             => $wins,
            'losses'           => $losses,
            'winPercentage'    => $wins / $attempts,
            'lossesPercentage' => $losses / $attempts
        ];

        return $this->render(':default:_simulation_results.html.twig', $templateParams);
    }
}
