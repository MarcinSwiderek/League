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
     * @var string
     *
     * @ORM\Column(name="team_photo_url", type="string", length=255)
     */
    private $teamPhotoUrl;

    /**
     * @ORM\ManyToOne(targetEntity="League")
     * @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     * @var integer
     */
    private $league;

    
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
}
