<?php
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 9/15/2015
 * Time: 01:11 PM
 */

namespace CustomerOrder\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomerOrderController
 * @package CustomerOrder\CustomerBundle\Controller
 */
class CustomerOrderController extends Controller
{

    /**
     * Get list orders
     */
    public function getListOrdersAction()
    {

    }

    /**
     * Add customer action
     *
     * @return Response
     */
    public function addCustomerAction()
    {
        $customerData = json_decode($this->get("request")->request->get("customerData"), true);

        if(empty($customerData)) return new Response("{status: false}");

        $this->get("customer_model")->addCustomer($customerData["name"], $customerData["phone"], $customerData["address"]);

        return new Response("{ status: true}");
    }

    /**
     * Get list customers
     *
     * @return Response
     */
    public function getListCustomersAction()
    {
        $listCustomersJson = json_encode($this->get("customer_model")->getListCustomers());

        return new Response($listCustomersJson);
    }
}