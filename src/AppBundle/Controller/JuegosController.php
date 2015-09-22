<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class JuegosController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction() {
        return new Response("<html><body><h1>Bienvenido</h1></body></html>");
    }

    /**
     * 
     * @Route("/dado/{cantidad}")
     */
    public function dadosAction($cantidad) {
        for($i=1; $i<=$cantidad; $i++){
            $numeros[$i]=rand(1,6);
        }
        
        return $this->render('juegos/dados.html.twig', array(
                    'resultados' => $numeros
                        )
        );
    }

    /**
     * 
     * @Route("/dado/json")
     */
    public function dadosJsonAction() {
        $numero = rand(1, 6);
        $data = array('numero' => $numero);
        /*return new Response(json_encode($data)
                , 200
                , array(
                    'Content-Type' => 'application/json')
                );*/
        return new JsonResponse(json_encode($data));
    }

}
