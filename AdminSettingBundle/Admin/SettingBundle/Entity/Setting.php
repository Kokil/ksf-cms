<?php

namespace Admin\SettingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 *
 * @ORM\Table(name="Setting")
 * @ORM\Entity
 */
class Setting
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=500, nullable=false)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="description‎", type="string", length=500, nullable=false)
     */
    private $description‎;

    /**
     * @var string
     *
     * @ORM\Column(name="google_analitic", type="string", length=100, nullable=false)
     */
    private $googleAnalitic;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_url", type="string", length=100, nullable=false)
     */
    private $facebookUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="linked_url", type="string", length=100, nullable=false)
     */
    private $linkedUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_url", type="string", length=100, nullable=false)
     */
    private $twitterUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="site_status", type="integer", nullable=false)
     */
    private $siteStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
