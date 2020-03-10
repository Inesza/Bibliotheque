<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Livre;

class LivreFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(50, "livre", function($num){
            $titre = $this->faker->sentence(5, true);
            $auteur = $this->faker->firstName . " " . strtoupper($this->faker->lastName);
            return (new Livre)->setTitre($titre)
                              ->setAuteur($auteur);
        });
        $manager->flush();
    }
}
