<?php

namespace App\DataFixtures;

use App\Entity\Carotte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarotteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $carotteTab = array(
            "Aubergine" => array(
                "categorie" => "Légume",
                "image" => "aubergine_flat.png"
            ),
            "Courgette" => array(
                "categorie" => "Légume",
                "image" => "courgette_flat.png"
            ),
            "Patate" => array(
                "categorie" => "Légume",
                "image" => "patate_flat.png"
            ),
            "Tomate" => array(
                "categorie" => "Légume",
                "image" => "tomate_flat.png"
            ),
            "Abricot" => array(
                "categorie" => "Fruit",
                "image" => "abricot_flat.png"
            ),
            "Banane" => array(
                "categorie" => "Fruit",
                "image" => "banane_flat.png"
            ),
            "Cerise" => array(
                "categorie" => "Fruit",
                "image" => "cerise_flat.png"
            ),
            "Citron" => array(
                "categorie" => "Fruit",
                "image" => "citron_flat.png"
            ),
            "Fraise" => array(
                "categorie" => "Fruit",
                "image" => "fraise_flat.png"
            ),
            "Framboise" => array(
                "categorie" => "Fruit",
                "image" => "framboise_flat.png"
            ),
            "Kiwi" => array(
                "categorie" => "Fruit",
                "image" => "kiwi_flat.png"
            ),
            "Mûre" => array(
                "categorie" => "Fruit",
                "image" => "mure_flat.png"
            ),
            "Pêche" => array(
                "categorie" => "Fruit",
                "image" => "peche_flat.png"
            ),
            "Poire" => array(
                "categorie" => "Fruit",
                "image" => "poire_flat.png"
            ),
            "Pomme" => array(
                "categorie" => "Fruit",
                "image" => "pomme_flat.png"
            ),
            "Raisin" => array(
                "categorie" => "Fruit",
                "image" => "raisin_flat.png"
            )
        );
        
        foreach ($carotteTab as $key => $value){
            $carotte = new Carotte();
            $carotte->setNom($carotteTab[$key]);
            $carotte->setCategorie($value['categorie']);
            $carotte->setImage($value['image']);
            $manager->persist($carotte);
            $manager->flush();
        }
    }
}
