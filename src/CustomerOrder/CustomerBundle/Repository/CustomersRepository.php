<?php

namespace CustomerOrder\CustomerBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CustomersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomersRepository extends EntityRepository
{
    /**
     * Get id name customers
     *
     * @return \Doctrine\ORM\Query
     */
    public function getIdNameCustomers()
    {
        $query = $this->createQueryBuilder("c")
            ->select("c.customerId")
            ->addSelect("c.name");

        return $query->getQuery();
    }

    /**
     * Get customer infor by customer id
     *
     * @param integer $customerId
     *
     * @return \Doctrine\ORM\Query
     */
    public function getCustomerInfoByCustomerId($customerId)
    {
        $query = $this->createQueryBuilder("c")
            ->select("c.customerId")
            ->addSelect("c.name")
            ->addSelect("c.address")
            ->addSelect("c.phone")
            ->where("c.customerId=:customerId")
            ->setParameter("customerId", $customerId);

        return $query->getQuery();
    }

    /**
     * Update customer
     *
     * @param integer $phone
     * @param string $name
     * @param string $address
     * @param integer $customerId
     * @return \Doctrine\ORM\Query
     */
    public function updateCustomer($phone, $name, $address, $customerId)
    {
        $query = $this->createQueryBuilder("c");
        $query
            ->update()
            ->set("c.phone", $query->expr()->literal($phone))
            ->set("c.name", $query->expr()->literal($name))
            ->set("c.address", $query->expr()->literal($address))
            ->where("c.customerId =:customerId")
            ->setParameter("customerId", $customerId);

        return $query->getQuery();
    }

    public function deleteCustomer($customerId)
    {
        $query = $this->createQueryBuilder("c")
            ->delete()
            ->where("c.customerId=:customerId")
            ->setParameter("customerId", $customerId);

        return $query->getQuery();
    }
}
