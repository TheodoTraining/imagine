<?php

namespace Theodo\ImagineFormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PresentationController extends Controller
{
    /**
     * @Route("/", name="theodo_imagine_formation_home")
     */
    public function homeAction(Request $request)
    {
        return $this->redirect($this->generateUrl('theodo_imagine_formation_presentation'));
    }

    /**
     * @Route("/presentation", name="theodo_imagine_formation_presentation")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return array();
    }
}
