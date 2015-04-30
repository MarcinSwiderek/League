<?php

namespace CL\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CL\LeagueBundle\Entity\TeamRepository")
 */
class Team
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="team_logo_url", type="string", length=255, nullable=true)
     * @var unknown
     */
    private $teamLogoUrl;
    
    /**
     * @var string
     *
     * @ORM\Column(name="team_photo_url", type="string", length=255, nullable=true)
     */
    private $teamPhotoUrl;

    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="teams")
     * @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     * @var integer
     */
    private $league;
    
    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     * @var unknown
     */
    private $players;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="hometeam")
     * @var unknown
     */
    
    private $matches;

    
    public function __toString(){
    	return (string)$this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set teamPhotoUrl
     *
     * @param string $teamPhotoUrl
     * @return Team
     */
    public function setTeamPhotoUrl($teamPhotoUrl)
    {
        $this->teamPhotoUrl = $teamPhotoUrl;

        return $this;
    }

    /**
     * Get teamPhotoUrl
     *
     * @return string 
     */
    public function getTeamPhotoUrl()
    {
        return $this->teamPhotoUrl;
    }

    /**
     * Set league
     *
     * @param \CL\LeagueBundle\Entity\League $league
     * @return Team
     */
    public function setLeague(\CL\LeagueBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \CL\LeagueBundle\Entity\League 
     */
    public function getLeague()
    {
        return $this->league;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add players
     *
     * @param \CL\LeagueBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\CL\LeagueBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \CL\LeagueBundle\Entity\Player $players
     */
    public function removePlayer(\CL\LeagueBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set teamLogoUrl
     *
     * @param string $teamLogoUrl
     * @return Team
     */
    public function setTeamLogoUrl($teamLogoUrl)
    {
        $this->teamLogoUrl = $teamLogoUrl;

        return $this;
    }

    /**
     * Get teamLogoUrl
     *
     * @return string 
     */
    public function getTeamLogoUrl()
    {
        return $this->teamLogoUrl;
    }

    /**
     * Add matches
     *
     * @param \CL\LeagueBundle\Entity\Game $matches
     * @return Team
     */
    public function addMatch(\CL\LeagueBundle\Entity\Game $matches)
    {
        $this->matches[] = $matches;

        return $this;
    }

    /**
     * Remove matches
     *
     * @param \CL\LeagueBundle\Entity\Game $matches
     */
    public function removeMatch(\CL\LeagueBundle\Entity\Game $matches)
    {
        $this->matches->removeElement($matches);
    }

    /**
     * Get matches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatches()
    {
        return $this->matches;
    }
}
