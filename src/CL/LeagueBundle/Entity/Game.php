<?php

namespace CL\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CL\LeagueBundle\Entity\GameRepository")
 */
class Game
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
     * @var integer
     * @ORM\ManyToOne(targetEntity="player", inversedBy="matches")
     * @ORM\JoinColumn(name="hometeam", referencedColumnName="id")
     */
    private $hometeam;

    /**
     * @var integer
     *
     * @ORM\Column(name="awayteam", type="integer")
     */
    private $awayteam;

    /**
     * @var integer
     *
     * @ORM\Column(name="league", type="integer")
     */
    private $league;

    /**
     * @var integer
     *
     * @ORM\Column(name="goals_for", type="integer")
     */
    private $goalsFor;

    /**
     * @var integer
     *
     * @ORM\Column(name="goals_against", type="integer")
     */
    private $goalsAgainst;


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
     * Set hometeam
     *
     * @param integer $hometeam
     * @return Game
     */
    public function setHometeam($hometeam)
    {
        $this->hometeam = $hometeam;

        return $this;
    }

    /**
     * Get hometeam
     *
     * @return integer 
     */
    public function getHometeam()
    {
        return $this->hometeam;
    }

    /**
     * Set awayteam
     *
     * @param integer $awayteam
     * @return Game
     */
    public function setAwayteam($awayteam)
    {
        $this->awayteam = $awayteam;

        return $this;
    }

    /**
     * Get awayteam
     *
     * @return integer 
     */
    public function getAwayteam()
    {
        return $this->awayteam;
    }

    /**
     * Set league
     *
     * @param integer $league
     * @return Game
     */
    public function setLeague($league)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return integer 
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Set goalsFor
     *
     * @param integer $goalsFor
     * @return Game
     */
    public function setGoalsFor($goalsFor)
    {
        $this->goalsFor = $goalsFor;

        return $this;
    }

    /**
     * Get goalsFor
     *
     * @return integer 
     */
    public function getGoalsFor()
    {
        return $this->goalsFor;
    }

    /**
     * Set goalsAgainst
     *
     * @param integer $goalsAgainst
     * @return Game
     */
    public function setGoalsAgainst($goalsAgainst)
    {
        $this->goalsAgainst = $goalsAgainst;

        return $this;
    }

    /**
     * Get goalsAgainst
     *
     * @return integer 
     */
    public function getGoalsAgainst()
    {
        return $this->goalsAgainst;
    }
}
