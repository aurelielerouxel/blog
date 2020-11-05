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
        $subject->setContent('lol');
        $subject->setDate(new \DateTime());
        $subject->setUserName('kikoololer');
        $subject->setCategory('WTF');
        $subject->setView('2');
        $manager->persist($subject);

        $manager->flush();
    }
}
