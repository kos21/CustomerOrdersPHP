<?php

namespace CustomerOrder\CustomerBundle\Entity;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $orderId;

    /**
     * @var \DateTime
     */
    private $postedAt;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $paidAt;

    /**
     * @var \CustomerOrder\CustomerBundle\Entity\Customers
     */
    private $customer;


    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     *
     * @return Orders
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set paidAt
     *
     * @param \DateTime $paidAt
     *
     * @return Orders
     */
    public function setPaidAt($paidAt)
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    /**
     * Get paidAt
     *
     * @return \DateTime
     */
    public function getPaidAt()
    {
        return $this->paidAt;
    }

    /**
     * Set customer
     *
     * @param \CustomerOrder\CustomerBundle\Entity\Customers $customer
     *
     * @return Orders
     */
    public function setCustomer(\CustomerOrder\CustomerBundle\Entity\Customers $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \CustomerOrder\CustomerBundle\Entity\Customers
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}

