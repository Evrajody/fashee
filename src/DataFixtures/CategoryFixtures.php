<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $customCategories = [
            "Robes",
            "Sacs",
            "Chemises",
            "Chaussures",
            "Montres",
            "Bracelets"
        ];

        for ($i=0; $i < count($customCategories) ; $i++) { 
            $category = new Category();
            $category->setNom($customCategories[$i]);
            $category->setCreateAt(new DateTime());
            $category->setUpdatedAt(new DateTime());
            $manager->persist($category);
        }

        $manager->flush();
    }
}
