<?php

use models\entities\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Create
 *
 * @author NeonTetras
 */
class Users extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library("doctrine");
         $this->load->helper("url_helper");
    }

    public function index() {
     //   $this->load->helper("url_helper");
        $this->load->view("users/index");
    }

    public function create($username, $email, $phone, $fullname, $password) {
        // $user = $this->user_model->getUser();
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPhone($phone);
        $user->setFullname($fullname);
        $user->setPassword($password);
        $user->setCreated(new DateTime("now"));
        $this->doctrine->em->persist($user);
        $this->doctrine->em->flush();

        echo "<br />User created successfully";
    }

    public function all() {
        $users = $this->user_model->getAll();
//        $rep = $this->doctrine->em->getRepository(User::class);
//        
//        $users = $rep->findAll();
        $data['users'] = $users;
        $this->load->view("view_users", $data);
    }
    
    public function login(){
        //$this->load->helper("bootstrap_helper");
       $this->load->view("header/header");
        $this->load->view("users/login");
        $this->load->view("footer/footer");
    }

}
