<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Motivation
 *
 * @ApiResource
 * @ORM\Entity
 */
class Motivation
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
     * @var string The title of motivation
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string Description of the motivation
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var \DateTimeInterface The date of publication of this motivation
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $created;

    /**
     * @var Category Category of the motivation

     * @ORM\ManyToOne(targetEntity="Category", inversedBy="motivations")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var \AppBundle\Entity\Checkout\CountableCheckout[] List of countable checkouts
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Checkout\CountableCheckout", mappedBy="motivation", cascade={"persist", "remove"})
     */
    private $countableCheckouts;

    /**
     * @var \AppBundle\Entity\Checkout\TimeableCheckout[] List of timeable checkouts
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Checkout\TimeableCheckout", mappedBy="motivation", cascade={"persist", "remove"})
     */
    private $timeableCheckouts;

    /**
     * @var User User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="motivations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Assert\NotBlank
     */
    private $user;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->countableCheckouts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->timeableCheckouts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Motivation
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
     * @return Motivation
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
     * @return Motivation
     */
    public function setCreated($created = null)
    {
        if ($created) {
            $this->created = $created;
        } else if (is_string($created)) {
            $this->created = \DateTime::format($created);
        } else {
            $this->created = new \DateTime();
        }

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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Motivation
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Motivation
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

    /**
     * Add countableCheckout
     *
     * @param \AppBundle\Entity\Checkout\CountableCheckout $countableCheckout
     *
     * @return Motivation
     */
    public function addCountableCheckout(\AppBundle\Entity\Checkout\CountableCheckout $countableCheckout)
    {
        $this->countableCheckouts[] = $countableCheckout;

        return $this;
    }

    /**
     * Remove countableCheckout
     *
     * @param \AppBundle\Entity\Checkout\CountableCheckout $countableCheckout
     */
    public function removeCountableCheckout(\AppBundle\Entity\Checkout\CountableCheckout $countableCheckout)
    {
        $this->countableCheckouts->removeElement($countableCheckout);
    }

    /**
     * Get countableCheckouts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountableCheckouts()
    {
        return $this->countableCheckouts;
    }

    /**
     * Add timeableCheckout
     *
     * @param \AppBundle\Entity\Checkout\TimeableCheckout $timeableCheckout
     *
     * @return Motivation
     */
    public function addTimeableCheckout(\AppBundle\Entity\Checkout\TimeableCheckout $timeableCheckout)
    {
        $this->timeableCheckouts[] = $timeableCheckout;

        return $this;
    }

    /**
     * Remove timeableCheckout
     *
     * @param \AppBundle\Entity\Checkout\TimeableCheckout $timeableCheckout
     */
    public function removeTimeableCheckout(\AppBundle\Entity\Checkout\TimeableCheckout $timeableCheckout)
    {
        $this->timeableCheckouts->removeElement($timeableCheckout);
    }

    /**
     * Get timeableCheckouts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimeableCheckouts()
    {
        return $this->timeableCheckouts;
    }
}
