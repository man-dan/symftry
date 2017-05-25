<?php

namespace Iphpsandbox\PhotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('IphpsandboxPhotoBundle:Default:index.html.twig');
    }
}
