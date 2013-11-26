<?php

namespace Theodo\ImagineFormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PresentationtController extends Controller
{
    /**
     * @Route("/presentation")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return array();
    }
}
