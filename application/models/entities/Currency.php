<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models\entities;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Currency
 *
 * @author NeonTetras
 * 
 *@ORM\Entity
 *@ORM\Table (name="currency")
 */
class Currency {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue;
     * @ORM\Column (type="integer");
     */
    protected $id;
   
    
    /**
     @ORM\Column(type="string", nullable=false)
     *
     */
    protected $currency;
    
     /**
     @ORM\Column(type="string", nullable=false)
     *
     */
    protected $abbrevation;
    /**
     * @ORM\Column (type="string", nullable=false)
     */
    protected $value;
  
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

   
    function setStatus($status) {
        $this->status = $status;
    }

    function setCreated(DateTime $created) {
        $this->created = $created;
    }

    function setUpdated(DateTime $updated) {
        $this->updated = $updated;
    }
    function getCurrency() {
        return $this->currency;
    }

    function getAbbrevation() {
        return $this->abbrevation;
    }

    function getValue() {
        return $this->value;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setAbbrevation($abbrevation) {
        $this->abbrevation = $abbrevation;
    }

    function setValue($value) {
        $this->value = $value;
    }



    
    
}
