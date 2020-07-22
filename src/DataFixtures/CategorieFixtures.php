<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $catTab = array("Légume","Fruit","Autre");
        
        foreach ($catTab as &$value){
            $categorie = new Categorie();
            $categorie->setNom($value);
            $manager->persist($categorie);
            $manager->flush();
        }
    }
}
