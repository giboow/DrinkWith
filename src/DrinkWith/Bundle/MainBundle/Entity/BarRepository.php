<?php
namespace DrinkWith\Bundle\MainBundle\Entity;

use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\EntityRepository;
use \PDO;

/**
 * Bar Repository
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class BarRepository extends EntityRepository
{
    /**
     * Get numbers of bar registered
     *
     * @return array
     */
    public function count()
    {
        $qB = $this->getEntityManager()->createQueryBuilder();
        $qB->select($qB->expr()->count('b.id'))
            ->from('DrinkWithMainBundle:Bar', 'b');

        return $qB->getQuery()->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }


    /**
     * Save
     * @param Bar $bar
     */
    public function saveBar(Bar $bar)
    {
        $this->_em->persist($bar);
        $this->_em->flush($bar);
    }
}
