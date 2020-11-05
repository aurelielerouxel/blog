<?php

namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
// use App\Entity\Subject;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $subject = new Subject();
        $subject->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur viverra urna diam. Sed in nunc commodo, pharetra enim non, condimentum elit. Nullam dolor tortor, fringilla sed consequat eget, varius eget ligula. Suspendisse pulvinar interdum felis, et ultrices elit faucibus eu. Curabitur convallis mi eget ipsum sagittis sollicitudin. Phasellus turpis lectus, interdum in erat sit amet, cursus scelerisque nulla. Nunc venenatis orci eu odio maximus elementum. Donec sit amet est velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Sed quis orci scelerisque elit consequat sodales. Suspendisse orci est, gravida non mollis vel, commodo eget nisi. Nam eleifend euismod metus, at.');
        $subject->setDate(new \DateTime());
        $subject->setUserName('kikoololer');
        $subject->setCategory('WTF');
        $subject->setView('2');
        $manager->persist($subject);

        $subject = new Subject();
        $subject->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur viverra urna diam. Sed in nunc commodo, pharetra enim non, condimentum elit. Nullam dolor tortor, fringilla sed consequat eget, varius eget ligula. Suspendisse pulvinar interdum felis, et ultrices elit faucibus eu. Curabitur convallis mi eget ipsum sagittis sollicitudin. Phasellus turpis lectus, interdum in erat sit amet, cursus scelerisque nulla. Nunc venenatis orci eu odio maximus elementum. Donec sit amet est velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Sed quis orci scelerisque elit consequat sodales. Suspendisse orci est, gravida non mollis vel, commodo eget nisi. Nam eleifend euismod metus, at.');
        $subject->setDate(new \DateTime());
        $subject->setUserName('emesthé');
        $subject->setCategory('Keskiya');
        $subject->setView('15');
        $manager->persist($subject);

        $manager->flush();
    }
}
