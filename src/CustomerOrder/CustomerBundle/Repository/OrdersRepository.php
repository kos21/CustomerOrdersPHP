<?php

namespace CustomerOrder\CustomerBundle\Repository;

use CustomerOrder\CustomerBundle\Entity\Customers;
use CustomerOrder\CustomerBundle\Entity\Orders;
use Doctrine\ORM\EntityRepository;

/**
 * OrdersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrdersRepository extends EntityRepository
{
    /**
     * Get orders by customer id
     *
     * @param integer $customerId
     *
     * @return \Doctrine\ORM\Query
     */
    public function getOrdersByCustomerId($customerId)
    {
        $query = $this->createQueryBuilder("o")
            ->addSelect("o.orderId")
            ->addSelect("o.amount")
            ->addSelect("o.paidAt")
            ->addSelect("o.postedAt")
            ->where("o.customer=:customerId")
            ->setParameter("customerId", $customerId);

        return $query->getQuery();
    }

    /**
     * Add order
     *
     * @param string $postedAt
     * @param integer $amount
     * @param string $paidAt
     * @param Customers $customers
     */
    public function addOrder($postedAt, $amount, $paidAt, Customers $customers)
    {
        $orderEntity = new Orders();
        $orderEntity->setAmount($amount);
        $orderEntity->setCustomer($customers);
        $orderEntity->setPostedAt(new \DateTime($postedAt));
        $orderEntity->setPaidAt(new \DateTime($paidAt));

        $this->_em->persist($orderEntity);
        $this->_em->flush();
    }
}
