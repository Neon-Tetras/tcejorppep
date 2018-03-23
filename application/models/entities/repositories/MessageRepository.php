<?php
namespace models\entities\messages\repositories;
use Doctrine\ORM\EntityRepository;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageRepository
 *
 * @author NeonTetras
 */
class MessageRepository extends EntityRepository{
    //put your code here
    
     public function getReceivedMessages($userId,$conversationId)
    {
           $parameters = array("rec"=>$userId,
                            "con"=>$conversationId);
        //$dql = "SELECT p,u FROM Points p JOIN p.user u where u.id = ?1";
            $dql = "SELECT c,u,m  FROM Messages m JOIN m.user u LEFT JOIN m.conversation c  "
                    . "      WHERE  c=:con and m.user = :rec ";
   
        return $this->getEntityManager()->createQuery($dql)
                             ->setParameters($parameters)
                             ->getResult();
    }
}
