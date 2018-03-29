<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models\entities;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Wallet
 *
 * @author NeonTetras
 * 
 *@ORM\Entity
 *@ORM\Table (name="wallet")
 */
class Wallet {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue;
     * @ORM\Column (type="integer");
     */
    protected $id;
   
    
   
    /**
     * @ORM\ManyToOne(targetEntity="users", inversedBy="wallets")
     * @var User
     */
    protected $user;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $currency;
    
     /**
     @ORM\Column(type="string", nullable=false)
     *@var string
     */
    protected $walletId;
    /**
     * @ORM\Column (type="float", nullable=false)
     * 
     */
    protected $balance;
  
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

    function getUser(): User {
        return $this->user;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getWalletId() {
        return $this->walletId;
    }

    function getBalance() {
        return $this->balance;
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

    function setUser(User $user) {
        $this->user = $user;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setWalletId($walletId) {
        $this->walletId = $walletId;
    }

    function setBalance($balance) {
        $this->balance = $balance;
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

 
    
}
