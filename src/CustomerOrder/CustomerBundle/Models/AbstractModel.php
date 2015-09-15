<?php
/**
 * Created by PhpStorm.
 * User: Kostiantyn
 * Date: 9/15/2015
 * Time: 02:14 PM
 */

namespace CustomerOrder\CustomerBundle\Models;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractModel
 * @package CustomerOrder\CustomerBundle\Models
 */
abstract class AbstractModel
{
    /**
     * Entity manager
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Set entity manager
     *
     * @param EntityManager $entityManager
     */
    protected function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }
}