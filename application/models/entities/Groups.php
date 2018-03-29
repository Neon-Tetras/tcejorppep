<?php
namespace models\entities;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of UserGroups
 *
 * @author NeonTetras
 * @ORM\Entity
 * @ORM\Table (name="groups")
 */
class Groups {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", length=8)
     * @var integer
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @var string
     */
    protected $name;
       /**
     * @ORM\Column(type="string", length=20, nullable=false)
     * @var string
     */
    protected $description;
    
   
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getUsers() {
        return $this->users;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setUsers($users) {
        $this->users = $users;
    }


    
}
