<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category of motivations
 *
 * @ApiResource
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The title of category
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string Description of the category
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var \DateTimeInterface The date of publication of this category
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $created;

    /**
     * @var Motivation[] List of motivations
     *
     * @ORM\OneToMany(targetEntity="Motivation", mappedBy="category", cascade={"persist", "remove"})
     */
    private $motivations;

    /**
     * @var User User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="categories")
     * @Assert\NotBlank
     */
    private $user;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->motivations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Category
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Add motivation
     *
     * @param \AppBundle\Entity\Motivation $motivation
     *
     * @return Category
     */
    public function addMotivation(\AppBundle\Entity\Motivation $motivation)
    {
        $this->motivations[] = $motivation;

        return $this;
    }

    /**
     * Remove motivation
     *
     * @param \AppBundle\Entity\Motivation $motivation
     */
    public function removeMotivation(\AppBundle\Entity\Motivation $motivation)
    {
        $this->motivations->removeElement($motivation);
    }

    /**
     * Get motivations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMotivations()
    {
        return $this->motivations;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Category
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
