<?php

use models\entities\User;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author NeonTetras
 */
class User_model extends CI_Model {
    
    public $user;
    function __construct() {
        parent::__construct();
        
        $this->load->library("doctrine");
        
       // $this->user = new User();
        
    }

    function getUser(){
        return $this->user;
    }
    
    function getAll(){
          $rep = $this->doctrine->em->getRepository(User::class);
        
        return  $rep->findAll();
        
    }
}
