<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Article;
use App\Entity\PhotoArticle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ArticleFixture extends Fixture  implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {

        $faker =  Factory::create("FR_fr");

        for ($i = 0; $i < 50; $i++) {

            $article = new Article();

            // on  lui cree une photo
            $articlePhoto =  new PhotoArticle();
            $articlePhoto->setImages("images/single-products/product-" . rand(1, 9) . ".jpg");
            $articlePhoto->setCreatedAt(new DateTime());
            $articlePhoto->setUpdatedAt(new DateTime());
            $manager->persist($articlePhoto);

            $article->setNom($faker->word());
            $article->setPrix($faker->numberBetween(500, 50000));
            $article->setOnpromo(rand(0, 1));
            $article->setDescription($faker->words(100, true));
            $article->addPhoto($articlePhoto);

            $article->setCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE));

           //$article->setCategory();

            $article->setCreatedAt(new DateTime());
            $article->setUpdatedAt(new DateTime());

            $manager->persist($article);
        }

        $manager->flush();
    }


        public function getDependencies()
        {
            return array(
                CategoryFixtures::class,
            );
        }




}
