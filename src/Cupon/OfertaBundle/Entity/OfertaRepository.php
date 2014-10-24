<?php

namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;


class OfertaRepository extends EntityRepository{
    
    public function findOfertaDelDia($ciudad){
        $em = $this->getEntityManager();
        $dql = 'SELECT o, c, t 
                FROM OfertaBundle:Oferta o
                JOIN o.ciudad c JOIN o.tienda t
                WHERE c.id=202
                ';
        $consulta = $em->createQuery($dql);
        //$consulta->setParameter('ciudad',$ciudad);
        $consulta->setMaxResults(1);
        return $consulta->getSingleResult();
    }
    public function findOferta($ciudad,$slug){
        $em = $this->getEntityManager();
        
        $consulta = $em->createQuery('SELECT o, c, t
                FROM OfertaBundle:oferta o 
                     JOIN o.ciudad c 
                     JOIN o.tienda t
                WHERE o.revisada = true
                     AND o.slug = :slug
                     AND c.slug = :ciudad');
        $consulta->setParameter('slug',$slug);
        $consulta->setParameter('ciudad',$ciudad);
        $consulta->setMaxResults(1);

        
        return $consulta->getSingleResult();
    }
}

