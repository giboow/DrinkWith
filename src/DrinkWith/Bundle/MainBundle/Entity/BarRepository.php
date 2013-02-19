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
     * Save
     * @param Bar $bar
     */
    public function saveBar(Bar $bar)
    {
        $this->_em->persist($bar);
        $this->_em->flush($bar);
    }

    /**
     * Get numbers of bar registered
     *
     * @return int
     */
    public function count()
    {
        $qB = $this->getEntityManager()->createQueryBuilder();
        $qB->select($qB->expr()->count('b.id'))
            ->from('DrinkWithMainBundle:Bar', 'b');

        return $qB->getQuery()->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }




    /**
     * List bar, if want just query params $getQueryBuilder value must be set at true
     * @param bool $getQueryBuilder
     *
     * @return array|\Doctrine\ORM\QueryBuilder
     */
    public function listBar($getQueryBuilder = false)
    {
        $qB = $this->getEntityManager()->createQueryBuilder();
        $qB->select("b")->from("DrinkWithMainBundle:Bar", "b");
        if ($getQueryBuilder) {

            return $qB;
        }

        return $qB->getQuery()->getResult();
    }

    /**
     * Get best bars
     * @param int  $nb
     * @param bool $getQueryBuilder
     *
     * @return array|\Doctrine\ORM\QueryBuilder
     */
    public function getBestBars($nb, $getQueryBuilder=false)
    {
        $qB = $this->getEntityManager()->createQueryBuilder();
        $qB->select("b")->from("DrinkWithMainBundle:Bar", "b")
            ->setMaxResults($nb);
        if ($getQueryBuilder) {
            return $qB;
        }

        return $qB->getQuery()->getResult();

    }
}
