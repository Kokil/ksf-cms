<?php

namespace Admin\SettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SettingController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction()
    {
        die('koks working on setting');
    }
}
