<?php
namespace models\entities;

use Doctrine\ORM\Mapping as ORM;




/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 * 
 *
 * 
 * @author NeonTetras
 * @ORM\Entity 
 * @ORM\Table (name="user")
 * 
 */

class User  {
    
    

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @var string
     */
    protected $username;
    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @var string
     */
    protected $email;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $fullname;
    
    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @var string
     */
    protected $phone;
    /**
     *
     * @ORM\Column(type="string")
     * @var string
     */
    protected $password = null;
    /**
     * 
     * @ORM\Column(type="datetime", nullable=true, options={"default":0})
     * 
     * @var DateTime
     */
    protected $created = null;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    protected $lastLogin = null;
    
    /**
     * @ORM\Column(type="string", nullable=false, length=20);
     * @var string
     */
    protected $referralId = null;
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getFullname() {
        return $this->fullname;
    }

    function getPhone() {
        return $this->phone;
    }

    function getPassword() {
        return $this->password;
    }

    function getCreated(): DateTime {
        return $this->created;
    }

    function getLastLogin(): DateTime {
        return $this->lastLogin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setLastLogin(DateTime $lastLogin) {
        $this->lastLogin = $lastLogin;
    }
    
    function getReferralId() {
        return $this->referralId;
    }

    function setReferralId($referralId) {
        $this->referralId = $referralId;
    }


}
