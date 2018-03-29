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
 * @ORM\Table (name="users")
 * 
 */

class Users  {
    
    

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
     * @ORM\Column(type="string",name="first_name")
     * @var string
     */
    protected $firstName;
    
    /**
     * @ORM\Column(type="string",name="last_name")
     * @var string
     */
    protected $lastName;
    
     
    /**
     * @ORM\Column(type="string",name="company",nullable=true,options={"default"=Null})
     * @var string
     */
    protected $company;

    /**
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @var string
     */
    protected $phone;
    /**
     *
     * @ORM\Column(type="string", nullable=false)
     * @var string
     */
    protected $password;
    /**
     * 
     * @ORM\Column(type="datetime", nullable=true, options={"default":"CURRENT_TIMESTAMP"},name="created_on")
     * 
     * @var DateTime
     */
    protected $created;
    /**
     * @ORM\Column(type="datetime", nullable=true,name="last_login")
     * @var DateTime
     */
    protected $lastLogin = null;
    
    /**
     * @ORM\Column(type="string", nullable=false, length=20,name="referral_id");
     * @var string
     */
    protected $referralId = null;
    
    /**
     * @ORM\Column(type="integer", options={"default"=0},name="active")
     * @var integer
     */
    protected $isActive = 0;
    
    /**
     * @ORM\Column(type="string",length=45, name="ip_address", nullable=false)
     * @var string
     */
    protected $ipAddress;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $salt;
    
    /**
     * @ORM\Column(type="string",nullable=true, name="activation_code",length=40)
     */
    protected $activationCode;
    
    /**
     * @ORM\Column(type="string", nullable=true, name="remember_code",length=40)
     */
    protected $rememberCode;
    
    /**
     * @ORM\Column(type="string",nullable=true, name="forgotten_password_code",length=40)
     */
    protected $forgotPasswordCode;

    /**
     * @ORM\Column(type="integer", nullable=true, name="forgotten_password_time",length=11)
     * @var DateTime
     * 
     */
    protected $forgotPasswordTime;
    
     /**
     * 
     * @ORM\ManyToMany(targetEntity="groups", inversedBy="users")
     * @ORM\JoinTable(
     *  name="users_groups",
     *  joinColumns={
     *      @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *  }
     * )
     */
    protected $groups;
    
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
    
    function getIsActive() {
        return $this->isActive;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getCompany() {
        return $this->company;
    }

    function getIpAddress() {
        return $this->ipAddress;
    }

    function getSalt() {
        return $this->salt;
    }

    function getActivationCode() {
        return $this->activationCode;
    }

    function getRememberCode() {
        return $this->rememberCode;
    }

    function getForgotPasswordCode() {
        return $this->forgotPasswordCode;
    }

    function getForgotPasswordTime() {
        return $this->forgotPasswordTime;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setCompany($company) {
        $this->company = $company;
    }

    function setIpAddress($ipAddress) {
        $this->ipAddress = $ipAddress;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

    function setActivationCode($activationCode) {
        $this->activationCode = $activationCode;
    }

    function setRememberCode($rememberCode) {
        $this->rememberCode = $rememberCode;
    }

    function setForgotPasswordCode($forgotPasswordCode) {
        $this->forgotPasswordCode = $forgotPasswordCode;
    }

    function setForgotPasswordTime($forgotPasswordTime) {
        $this->forgotPasswordTime = $forgotPasswordTime;
    }
    
    function getGroups() {
        return $this->groups;
    }

    function setGroups($groups) {
        $this->groups = $groups;
    }







}
