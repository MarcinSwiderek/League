<?php

namespace CL\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CL\LeagueBundle\Entity\RoundRepository")
 */
class Round
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
     * @ORM\OneToMany(targetEntity="Game", mappedBy="round")
     * @var unknown
     */
    private $games;
    
    /**
     * @ORM\ManyToOne(targetEntity="LeagueTable", inversedBy="rounds")
     * @ORM\JoinColumn(name="league_table", referencedColumnName="id")
     * @var unknown
     */
    private $leagueTable;
    
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
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add games
     *
     * @param \CL\LeagueBundle\Entity\Game $games
     * @return Round
     */
    public function addGame(\CL\LeagueBundle\Entity\Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \CL\LeagueBundle\Entity\Game $games
     */
    public function removeGame(\CL\LeagueBundle\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set leagueTable
     *
     * @param \CL\LeagueBundle\Entity\LeagueTable $leagueTable
     * @return Round
     */
    public function setLeagueTable(\CL\LeagueBundle\Entity\LeagueTable $leagueTable = null)
    {
        $this->leagueTable = $leagueTable;

        return $this;
    }

    /**
     * Get leagueTable
     *
     * @return \CL\LeagueBundle\Entity\LeagueTable 
     */
    public function getLeagueTable()
    {
        return $this->leagueTable;
    }
}
