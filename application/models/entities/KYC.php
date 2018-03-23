<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace models\entities;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of KYC
 *
 * @author NeonTetras
 * 
 *@ORM\Entity
 *@ORM\Table (name="kyc")
 */
class KYC {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue;
     * @ORM\Column (type="integer");
     */
    protected $id;
    /**
     * @ORM\OneToOne(targetEntity="models\entities\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    
    /**
     @ORM\Column(type="string", nullable=false)
     *
     */
    protected $idCard;
    /**
     * @ORM\Column (type="string", nullable=false)
     */
    protected $picture;
    /**
     * @ORM\Column (type="string", nullable=true)
     */
    protected $comment;
    /**
     * @ORM\Column (type="integer", length=1, options={"default": 0})
     * @var integer
     */
    protected $status  = 0;
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

    function getUser() {
        return $this->user;
    }

    function getIdCard() {
        return $this->idCard;
    }

    function getPicture() {
        return $this->picture;
    }

    function getComment() {
        return $this->comment;
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

    function setUser($user) {
        $this->user = $user;
    }

    function setIdCard($idCard) {
        $this->idCard = $idCard;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

    function setComment($comment) {
        $this->comment = $comment;
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
