<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'category';

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

            $category = new Category();
            $category->setNom($customCategories[rand(0, 5)]);
            $category->setCreateAt(new DateTime());
            $this->addReference(self::CATEGORY_REFERENCE, $category);
            $category->setUpdatedAt(new DateTime());
            $manager->persist($category);
            $manager->flush();
            // $this->addReference(self::ADMIN_USER_REFERENCE, $category);
    }
}
