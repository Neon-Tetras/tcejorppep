<?php
namespace models\entities\messages\repositories;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


use Doctrine\ORM\EntityRepository;


class ConversationRepository extends EntityRepository
{
    
    public function getRecentBugs($number = 30)
    {
        $dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();
    }

    public function getRecentBugsArray($number = 30)
    {
        $dql = "SELECT b, e, r, p FROM Bug b JOIN b.engineer e ".
               "JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getArrayResult();
    }

    
     public function getConversationsByDates($userId,$from,$to)
    {
        
        //$dql = "SELECT p,u FROM Points p JOIN p.user u where u.id = ?1";
            $dql = "SELECT c,s,r,m FROM Conversations c JOIN c.sender s JOIN c.recipient r JOIN c.messages m"
                    . "      WHERE  (s = :uid OR r = :uid) AND DATE(m.date) between :from and :to group by m.id  ";
         $parameters = array("uid"=>$userId ,
                                "from" =>$from,
                                "to" =>$to
                            );
        return $this->getEntityManager()->createQuery($dql)
                             ->setParameters($parameters)
                             ->getResult();
    }
    public function getConversations($userId)
    {
        //$dql = "SELECT p,u FROM Points p JOIN p.user u where u.id = ?1";
            $dql = "SELECT c,s,r,m FROM Conversations c JOIN c.sender s JOIN c.recipient r JOIN c.messages m"
                    . "      WHERE  (s = :uid OR r = :uid) AND m.date <=:date group by m.id  ";
         $parameters = array("uid"=>$userId,
                                "date" =>"2018-01-27"
                            );
        return $this->getEntityManager()->createQuery($dql)
                             ->setParameters($parameters)
                             ->getResult();
    }

    public function getReceivedMessages($userId,$conversationId)
    {
           $parameters = array("rec"=>$userId,
                            "con"=>$conversationId);
        //$dql = "SELECT p,u FROM Points p JOIN p.user u where u.id = ?1";
            $dql = "SELECT c,u,m  FROM Messages m JOIN m.user u JOIN m.conversation c  "
                    . "      WHERE   m.user =:rec and c.recipient = :rec and c = :con";
   
        return $this->getEntityManager()->createQuery($dql)
                             ->setParameters($parameters)
                             ->getResult();
    }

    public function getOpenBugsByProduct()
    {
        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Bug b ".
               "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
        return $this->getEntityManager()->createQuery($dql)->getScalarResult();
    }
}

