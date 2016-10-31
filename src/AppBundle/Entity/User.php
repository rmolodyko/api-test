<?php
namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"user", "user-read"}},
 *     "denormalization_context"={"groups"={"user", "user-write"}}
 * })
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Groups({"user"})
     * @Assert\Email
     */
    protected $email;

    /**
     * @var string Plain password of user
     * @Groups({"user-write"})
     */
    protected $plainPassword;

    /**
     * @var Motivation[] List of motivation
     *
     * @ORM\OneToMany(targetEntity="Motivation", mappedBy="user")
     */
    private $motivations;

    /**
     * @var Category[] List of motivation
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user", cascade={"persist", "remove"})
     */
    private $categories;

    /**
     * Check if user
     */
    public function isUser(UserInterface $user = null)
    {
        return $user instanceof self && $user->id === $this->id;
    }

    /**
     * Set email
     */
    public function setEmail($email)
    {
        $this->username = $email;
        $this->email = $email;

        return $this;
    }

    /**
     * Add motivation
     *
     * @param \AppBundle\Entity\Motivation $motivation
     *
     * @return User
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
     * Add category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return User
     */
    public function addCategory(\AppBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Category $category
     */
    public function removeCategory(\AppBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
