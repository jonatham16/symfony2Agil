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
    
}

