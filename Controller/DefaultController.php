<?php

namespace Watershine\FirebaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WatershineFirebaseBundle:Default:index.html.twig');
    }
}
