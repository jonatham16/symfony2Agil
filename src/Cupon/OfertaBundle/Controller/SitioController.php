<?php

namespace Cupon\OfertaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SitioController
 *
 * @author Cancerbero
 */
class SitioController extends Controller{
    //put your code here
    
    public function  estaticaAction($pagina)
    {        
        return $this->render('OfertaBundla:Sitio:'.$pagina.'.html.twig');
    }
}
