<?php

namespace DrinkWith\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;


/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\OneToMany(targetEntity="\DrinkWith\Bundle\MainBundle\Entity\Bar", mappedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id")
     */
    protected $bar;


    /**
     * Stringify user, return user id
     *
     * @see \FOS\UserBundle\Model\User::__toString()
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
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
     * Constructor
     */
    public function __construct()
    {
    }


    /**
     * Add bar
     * @param \DrinkWith\Bundle\MainBundle\Entity\Bar $bar
     *
     * @return User
     */
    public function addBar(\DrinkWith\Bundle\MainBundle\Entity\Bar $bar)
    {
        $this->bar[] = $bar;

        return $this;
    }

    /**
     * Remove bar
     *
     * @param \DrinkWith\Bundle\MainBundle\Entity\Bar $bar
     */
    public function removeBar(\DrinkWith\Bundle\MainBundle\Entity\Bar $bar)
    {
        $this->bar->removeElement($bar);
    }

    /**
     * Get bar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBar()
    {
        return $this->bar;
    }
}