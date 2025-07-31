<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use App\Enum\TechnologyCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $technologies = [
            ['React', TechnologyCategory::FRONTEND, 'react.svg'],
            ['Symfony', TechnologyCategory::BACKEND,'symfony.svg'],
            ['Docker', TechnologyCategory::DEVOPS, 'docker.svg'],
            ['GitHub Actions', TechnologyCategory::CICD, 'github.svg'],
            ['Git', TechnologyCategory::TOOLS, 'git.svg'],
        ];

        foreach ($technologies as [$name, $category, $logo]) {
            $tech = new Technology();
            $tech->setName($name);
            $tech->setCategory($category);
            $tech->setLogo($logo);

            $manager->persist($tech);
        }

        $manager->flush();
    }
}
