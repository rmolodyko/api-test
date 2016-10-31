<?php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


class LoadFixtures implements \Doctrine\Common\DataFixtures\FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    	$loader = new \Nelmio\Alice\Loader\NativeLoader();
        $objects = $loader->loadFile(__DIR__ . '/fixtures.yml');
        foreach ($objects->getObjects() as $entity) {
	    	$manager->persist($entity);
        }
        $manager->flush();
    }
}