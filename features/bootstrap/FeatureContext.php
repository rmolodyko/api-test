<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    const API_CUSTOMER_EMAIL = 'customer@customer.api';
    const API_CUSTOMER_PASSWORD = 'customer';

    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $manager;

    /**
     * @var SchemaTool
     */
    private $schemaTool;

    /**
     * @var array
     */
    private $classes;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->manager = $doctrine->getManager();
        $this->schemaTool = new SchemaTool($this->manager);
        $this->classes = $this->manager->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @BeforeScenario @createSchema
     */
    public function createDatabase()
    {
        $this->schemaTool->createSchema($this->classes);
    }

    /**
     * @AfterScenario @dropSchema
     */
    public function dropDatabase()
    {
        $this->schemaTool->dropSchema($this->classes);
    }

    /**
     * @Given Refresh database
     */
    public function refreshDatabase()
    {
        $this->schemaTool->dropDatabase();
        $this->createDatabase();
    }

    /**
     * @Given Create api customer
     */
    public function createApiCustomer()
    {
        $user = new \AppBundle\Entity\User();
        $user->setEmail(self::API_CUSTOMER_EMAIL);
        $user->setPlainPassword(self::API_CUSTOMER_PASSWORD);
        $user->setEnabled(true);

        $this->manager->persist($user);
        $this->manager->flush();
    }
}
