<?php

namespace CustomerOrder\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerOrderCustomerBundle:Default:index.html.twig');
    }
}
