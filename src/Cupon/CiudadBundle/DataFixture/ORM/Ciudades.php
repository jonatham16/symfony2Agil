<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cupon\CiudadBundle\DataFixture\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades implements FixtureInterface
{
    public function load(ObjectManager $manager) {
                $ciudades = array(
            array('nombre' => 'Madrid','slug' => 'madrid'),
            array('nombre' => 'Barcelona','slug' => 'barcelona'),
            array('nombre' => 'San Antonio','slug' => 'san antonio'),
            array('nombre' => 'Cucuta','slug' => 'Cucuta'),
            array('nombre' => 'San Cristobal','slug' => 'San Cristobal')
        );
        foreach ($ciudades as $ciudad){
            $entidad = new Ciudad();
            
            $entidad->setNombre($ciudad['nombre']);
            $entidad->setSlug($ciudad['slug']);
            
            $manager->persist($entidad);   
        }
        $manager->flush();
    }

}
