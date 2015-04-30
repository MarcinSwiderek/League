<?php

namespace CL\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeagueTable
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CL\LeagueBundle\Entity\LeagueTableRepository")
 */
class LeagueTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Round", mappedBy="leagueTable")
     * @var unknown
     */
    private $rounds;


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
        $this->rounds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rounds
     *
     * @param \CL\LeagueBundle\Entity\Round $rounds
     * @return LeagueTable
     */
    public function addRound(\CL\LeagueBundle\Entity\Round $rounds)
    {
        $this->rounds[] = $rounds;

        return $this;
    }

    /**
     * Remove rounds
     *
     * @param \CL\LeagueBundle\Entity\Round $rounds
     */
    public function removeRound(\CL\LeagueBundle\Entity\Round $rounds)
    {
        $this->rounds->removeElement($rounds);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRounds()
    {
        return $this->rounds;
    }
}
