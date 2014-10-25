<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
class DefaultController extends Controller
{
    public function ayudaAction()
    {
        return $this->render('OfertaBundle:Default:ayuda.html.twig');
    }
    public function portadaAction($ciudad = null) {
        
        if($ciudad == null){
           $ciudad = $this->container->getParameter('cupon.ciudad_por_defecto'); 
           return new RedirectResponse(
                   $this->generateUrl('portada', array('ciudad' => $ciudad))
                   );
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        
        /*$oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
                'ciudad' => $this->container->getParameter('cupon.ciudad_por_defecto')    
            ));
         * 
         */
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia('cupon.ciudad_por_defecto');
        if(!$oferta)
            throw $this->createNotFoundException ('No se encontron ninguuna oferta');
            
        return $this->render('OfertaBundle:Default:portada.html.twig',array('oferta' => $oferta));
    }
    public function ofertaAction($ciudad,$slug){
         $em = $this->getDoctrine()->getEntityManager();
         $oferta = $em->getRepository('OfertaBundle:Oferta')->findOferta($ciudad,$slug);
         $relacionadas = $em->getRepository('OfertaBundle:Oferta')
                 ->findRelacionadas($ciudad);
        return $this->render('OfertaBundle:Default:detalle.html.twig',
                array('oferta' => $oferta,
                      'relacionadas' => $relacionadas
                ));
    }
}
