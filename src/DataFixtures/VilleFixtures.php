<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $villeTab = array(
            "Toulouse" => 31000,
            "Nantes" => 44000,
            "Rennes" => 35000,
            "Albi" => 81000,
            "Paris" => 75000,
            "Rodez" => 12000
        );
        
        foreach ($villeTab as $key => $value){
            $ville = new Ville();
            $ville->setNom($villeTab[$key]);
            $ville->setCP($villeTab[$key][$value]);
            $manager->persist($ville);
            $manager->flush();
        }
    }
}
