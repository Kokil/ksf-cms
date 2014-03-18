<?php

namespace Admin\SettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 */
class Setting
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $keywords;

    /**
     * @var string
     */
    private $description‎;

    /**
     * @var string
     */
    private $googleAnalitic;

    /**
     * @var string
     */
    private $facebookUrl;

    /**
     * @var string
     */
    private $linkedUrl;

    /**
     * @var string
     */
    private $twitterUrl;

    /**
     * @var integer
     */
    private $siteStatus;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set title
     *
     * @param string $title
     * @return Setting
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
     * Set keywords
     *
     * @param string $keywords
     * @return Setting
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set description‎
     *
     * @param string $description‎
     * @return Setting
     */
    public function setDescription‎($description‎)
    {
        $this->description‎ = $description‎;

        return $this;
    }

    /**
     * Get description‎
     *
     * @return string 
     */
    public function getDescription‎()
    {
        return $this->description‎;
    }

    /**
     * Set googleAnalitic
     *
     * @param string $googleAnalitic
     * @return Setting
     */
    public function setGoogleAnalitic($googleAnalitic)
    {
        $this->googleAnalitic = $googleAnalitic;

        return $this;
    }

    /**
     * Get googleAnalitic
     *
     * @return string 
     */
    public function getGoogleAnalitic()
    {
        return $this->googleAnalitic;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     * @return Setting
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string 
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Set linkedUrl
     *
     * @param string $linkedUrl
     * @return Setting
     */
    public function setLinkedUrl($linkedUrl)
    {
        $this->linkedUrl = $linkedUrl;

        return $this;
    }

    /**
     * Get linkedUrl
     *
     * @return string 
     */
    public function getLinkedUrl()
    {
        return $this->linkedUrl;
    }

    /**
     * Set twitterUrl
     *
     * @param string $twitterUrl
     * @return Setting
     */
    public function setTwitterUrl($twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;

        return $this;
    }

    /**
     * Get twitterUrl
     *
     * @return string 
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    /**
     * Set siteStatus
     *
     * @param integer $siteStatus
     * @return Setting
     */
    public function setSiteStatus($siteStatus)
    {
        $this->siteStatus = $siteStatus;

        return $this;
    }

    /**
     * Get siteStatus
     *
     * @return integer 
     */
    public function getSiteStatus()
    {
        return $this->siteStatus;
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
}
