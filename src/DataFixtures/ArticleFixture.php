<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker = Faker\Factory::create('fr_FR');

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
