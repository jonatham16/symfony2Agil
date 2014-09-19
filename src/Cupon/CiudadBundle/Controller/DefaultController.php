<?php

namespace Cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CiudadBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function ciudadAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $ciudad = $em->getRepository('CiudadBundle:Ciudad')->find($id);
        return $this->render('CiudadBundle:Default:ciudad.html.twig',array('nombre' => $ciudad->getNombre()));
    }
}
