<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Récupérer toutes les technos depuis la base
        $technologies = $manager->getRepository(Technology::class)->findAll();

        $exp1 = new Experience();
        $exp1->setTitle("Développeur Fullstack");
        $exp1->setCompany("Niji");
        $exp1->setLocation("Rennes");
        $exp1->setStartDate(new \DateTime('2023-01-01'));
        $exp1->setEndDate(new \DateTime('2024-03-01'));
        $exp1->setDescription("Développement de sites web avec Symfony et React.");
        $exp1->setImage("niji.png");

        // Associe 2 technos arbitraires
        $exp1->addTechnology($technologies[0]);
        $exp1->addTechnology($technologies[1]);

        $manager->persist($exp1);

        $exp2 = new Experience();
        $exp2->setTitle("DevOps Junior");
        $exp2->setCompany("DevCompany");
        $exp2->setLocation("Télétravail");
        $exp2->setStartDate(new \DateTime('2022-05-01'));
        $exp2->setEndDate(null); 
        $exp2->setDescription("Mise en place d'une CI/CD avec Docker, GitHub Actions...");
        $exp2->setImage(null);

        $exp2->addTechnology($technologies[2]); // Docker
        $exp2->addTechnology($technologies[3]); // GitHub Actions

        $manager->persist($exp2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TechnologyFixtures::class,
        ];
    }
}
