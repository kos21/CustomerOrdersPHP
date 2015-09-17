<?php
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 9/16/2015
 * Time: 09:37 PM
 */

namespace CustomerOrder\CustomerBundle\Models;

use Doctrine\ORM\EntityManager;

/**
 * Class OrdersModel
 * @package CustomerOrder\CustomerBundle\Models
 */
class OrdersModel extends AbstractModel
{
    /**
     * Create entity manager
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
    }

    /**
     * Get list orders
     *
     * @param integer $customerId
     *
     * @return array
     */
    public function getListOrders($customerId)
    {
        return $this->getEntityManager()
            ->getRepository("CustomerOrderCustomerBundle:Orders")
            ->getOrdersByCustomerId($customerId)
            ->getArrayResult();
    }

    /**
     * Add order data
     *
     * @param integer $amount
     * @param string $postedAt
     * @param string $paidAt
     * @param integer $customerId
     */
    public function addOrderData($amount, $postedAt, $paidAt, $customerId)
    {
        $this->getEntityManager()
            ->getRepository("CustomerOrderCustomerBundle:Orders")
            ->addOrder($postedAt, $amount, $paidAt, $this->getEntityManager()->getRepository("CustomerOrderCustomerBundle:Customers")->find($customerId));
    }
}