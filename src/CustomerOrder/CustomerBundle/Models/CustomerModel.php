<?php

namespace CustomerOrder\CustomerBundle\Models;

use CustomerOrder\CustomerBundle\Entity\Customers;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;

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

    /**
     * Get customer info
     *
     * @param integer $customerId
     *
     * @return array
     */
    public function getCustomerInfo($customerId)
    {
        return $this->getEntityManager()
            ->getRepository("CustomerOrderCustomerBundle:Customers")
            ->getCustomerInfoByCustomerId($customerId)
            ->getResult();
    }

    /**
     * Add customer
     *
     * @param string $name
     * @param integer $phone
     * @param string $address
     */
    public function addCustomer($name, $phone, $address)
    {
        $customerEntity = new Customers();
        $customerEntity->setAddress($address);
        $customerEntity->setName($name);
        $customerEntity->setPhone($phone);

        $this->getEntityManager()->persist($customerEntity);
        $this->getEntityManager()->flush();
    }

    /**
     * Edit customer
     *
     * @param integer $phone
     * @param string $name
     * @param string $address
     * @param integer $customerId
     */
    public function editCustomer($phone, $name, $address, $customerId)
    {
        $this->getEntityManager()->getRepository("CustomerOrderCustomerBundle:Customers")
            ->updateCustomer(
                $phone,
                $name,
                $address,
                $customerId
            )->execute();
    }
}