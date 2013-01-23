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
}
