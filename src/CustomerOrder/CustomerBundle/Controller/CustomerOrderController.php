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
         return new Response(json_encode($this->get("orders_model")->getListOrders($this->get("request")->query->get("customer_id"))));
    }

    /**
     * Add customer action
     *
     * @return Response
     */
    public function addCustomerAction()
    {
        $this->get("customer_model")->addCustomer(
            $this->get("request")->request->get("name"),
            $this->get("request")->request->get("phone"),
            $this->get("request")->request->get("address")
        );

        return new Response("{ status: true }");
    }

    /**
     * Edit customer action
     */
    public function editCustomerAction()
    {
        $name = $this->get("request")->request->get("name");
        $phone = $this->get("request")->request->get("phone");
        $address = $this->get("request")->request->get("address");

        $this->get("customer_model")->editCustomer($phone, $name, $address, $this->get("request")->request->get("customerId"));

        return new Response("{status: true}");
    }

    /**
     * Get infor customer update action
     *
     * @return Response
     */
    public function getInfoCustomerUpdateAction()
    {
        $customerId = $this->get("request")->request->get("customer_id");

        return new Response(json_encode($this->get("customer_model")->getCustomerInfo($customerId)));
    }

    /**
     * Add order action
     */
    public function addOrderAction()
    {
        $postedAt = $this->get("request")->request->get("posted_at");
        $amount = $this->get("request")->request->get("amount");
        $paidAt = $this->get("request")->request->get("paid_at");
        $customerId = $this->get("request")->request->get("customerId");

        $this->get("orders_model")->addOrderData($amount, $postedAt, $paidAt, $customerId);

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