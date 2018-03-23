<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models\entities;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Transactions
 *
 * @author NeonTetras
 * 
 *@ORM\Entity
 *@ORM\Table (name="transactions")
 */
class Transactions {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     * 
     */
    protected $id;
   
    /**
     * 
     * @ORM\Column (type="integer")
     * @var int
     */
    protected $transactionId;
   
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @var User
     */
    protected $user;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $type;
    
     /**
     @ORM\ManyToOne(targetEntity="Trade")
     *@var Trade
     */
    protected $trade;
    /**
     * @ORM\ManyToOne (targetEntity="Currency")
     * 
     */
    protected $currency;
     /**
     * @ORM\Column (type="string", nullable=false)
     * @var string
     */
    protected $description;
    
      /**
     * @ORM\Column (type="float", nullable=false)
     * @var string
     */
    protected $amount;
  
    /**
     * @ORM\Column (type="integer", length=1, options={"default": 1})
     * @var integer
     */
    protected $status  = 1;
    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     * @var DateTime
     */
    protected $created = null;
    /**
     *@ORM\Column(type="datetime", nullable=true)
     *@var DateTime
     */
    protected $updated;
    
    function getId() {
        return $this->id;
    }

    function getTransactionId() {
        return $this->transactionId;
    }

    function getUser(): User {
        return $this->user;
    }

    function getType() {
        return $this->type;
    }

    function getTrade(): Trade {
        return $this->trade;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getDescription() {
        return $this->description;
    }

    function getAmount() {
        return $this->amount;
    }

    function getStatus() {
        return $this->status;
    }

    function getCreated(): DateTime {
        return $this->created;
    }

    function getUpdated(): DateTime {
        return $this->updated;
    }

   

    function setId($id) {
        $this->id = $id;
    }

    function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }

    function setUser(User $user) {
        $this->user = $user;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setTrade(Trade $trade) {
        $this->trade = $trade;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCreated(DateTime $created) {
        $this->created = $created;
    }

    function setUpdated(DateTime $updated) {
        $this->updated = $updated;
    }

   

     
    public static $TRANSACTION_TYPE = ["BUY","SELL","FUND","WITHDRAWAL"];
    
}
