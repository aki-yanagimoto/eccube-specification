<?php

namespace Eccube\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PaymentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaymentRepository extends EntityRepository
{
    public function findOrCreate($id)
    {
        if ($id == 0) {

            $Creator = $this
                ->getEntityManager()
                ->getRepository('\Eccube\Entity\Member')
                ->find(2);

            $rank = $this
                ->findOneBy(array(), array('rank' => 'DESC'))
                ->getRank() + 1;

            $Payment = new \Eccube\Entity\Payment();
            $Payment
                ->setRank($rank)
                ->setStatus(1)
                ->setDelFlg(0)
                ->setFix(2)
                ->setCreatorId($Creator->getId())
            ;

        } else {

            $Payment = $this->find($id);

        }

        return $Payment;
    }
}