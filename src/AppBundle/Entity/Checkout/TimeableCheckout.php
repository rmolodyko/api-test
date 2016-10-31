<?php

namespace AppBundle\Entity\Checkout;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Timeable checkout
 *
 * @ApiResource
 * @ORM\Entity
 */
class TimeableCheckout implements CheckoutInterface
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
     * @var \DateTimeInterface Start the checkout
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $start;

    /**
     * @var \DateTimeInterface End the checkout
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $end;

    /**
     * @var \AppBundle\Entity\Motivation Motivation
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Motivation", inversedBy="timeableCheckouts")
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return TimeableCheckout
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return TimeableCheckout
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set motivation
     *
     * @param \AppBundle\Entity\Motivation $motivation
     *
     * @return TimeableCheckout
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
