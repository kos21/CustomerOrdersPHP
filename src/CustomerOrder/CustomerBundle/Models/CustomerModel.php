<?php

namespace CustomerOrder\CustomerBundle\Models;

use CustomerOrder\CustomerBundle\Entity\Customers;
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 9/15/2015
 * Time: 02:13 PM
 */
class CustomerModel extends AbstractModel
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
     * Get list customers
     *
     * @return \Doctrine\ORM\Query
     */
    public function getListCustomers()
    {
        return $this->getEntityManager()
            ->getRepository("CustomerOrderCustomerBundle:Customers")
            ->getIdNameCustomers()
            ->getArrayResult();
    }

    public function addCustomer($name, $phone, $address)
    {
        $customerEntity = new Customers();
        $customerEntity->setAddress($address);
        $customerEntity->setName($name);
        $customerEntity->setPhone($phone);


    }
}