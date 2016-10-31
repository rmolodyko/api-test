<?php

namespace AppBundle\Entity\Checkout;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Countable checkout
 *
 * @ApiResource
 * @ORM\Entity
 */
class CountableCheckout implements CheckoutInterface
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
     * @var \DateTimeInterface Created checkout date
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $created;

    /**
     * @var \AppBundle\Entity\Motivation Motivation
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Motivation", inversedBy="countableCheckouts")
     * @ORM\JoinColumn(name="motivation_id", referencedColumnName="id")
     */
    private $motivation;

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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CountableCheckout
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
     * Set motivation
     *
     * @param \AppBundle\Entity\Motivation $motivation
     *
     * @return CountableCheckout
     */
    public function setMotivation(\AppBundle\Entity\Motivation $motivation = null)
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * Get motivation
     *
     * @return \AppBundle\Entity\Motivation
     */
    public function getMotivation()
    {
        return $this->motivation;
    }
}
