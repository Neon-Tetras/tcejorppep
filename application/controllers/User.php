<?php

use models\entities\Users;

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
class User extends CI_Controller {
    private $em = null;
    //put your code here
    function __construct() {
        parent::__construct();

        $this->load->model("user_model");
        $this->load->library("doctrine");

        $this->load->helper("url");
        $this->load->helper("functions");

    $this->em = $this->doctrine->em;
        $this->load->library("form_validation");
        $this->load->library('ion_auth');
    }

    public function index() {
        //   $this->load->helper("url_helper");
        $this->load->view("users/index");
    }

    public function register() {
       
       // $this->load->helper('security');
       // $user = new Users();
      
        
        $this->form_validation->set_rules("email", "email", 'trim|required|valid_email|callback_emailexists');
          $this->form_validation->set_rules("username", "username", 'trim|required|min_length[5]|max_length[12]|callback_username_exists');
        $this->form_validation->set_rules("phone", "phone", "required|callback_phone_exists", array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules("password", "password", 'trim|required|min_length[8]');
        $this->form_validation->set_rules("confirm", "Password Confirmation", 'trim|required|matches[password]');
        $this->form_validation->set_rules("first_name", "First Name", "required", array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules("last_name", "Last Name", "required", array('required' => 'You must provide a %s.'));
        
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $password = $this->input->post("password");
        $phone = $this->input->post("phone");
        $checkBox = $this->input->post("terms_of_service");
        
      

        if ($this->form_validation->run() == false) {
            $this->load->view("header/header");
            $this->load->view("users/reg_error.php");
            $this->load->view("footer/footer");
        } else {
         //   $error_code = $this->userExists($username, $email, $phone) ;
          //  $username = $username;
	//	$password = $password;
	//	$email = $email;
		$additional_data = array(
								'first_name' => $first_name,
								'last_name' => $last_name,
                                                                 'phone' => $phone,
                                                                  'referral_id'=> generate_hash($email)
								);
		$group = array('2'); // Sets user to admin.

                if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                    $data['email'] = $email;
                    $this->load->view("header/header");
                   $this->load->view("users/registration_success",$data);
                   $this->load->view("footer/footer");
                }

          
        }
    }
    
    public function username_exists($username){
        $error_code = -1;
        $parameters = array("uname"=>$username);
        $qb = $this->em->createQueryBuilder();
            $query = $qb->select("u")
                        ->from(Users::class,"u")
                        ->where($qb->expr()->orX(
                                
                                $qb->expr()->eq('u.username', ':uname')
                                   )
                                )
                    ->setParameters($parameters)
                        ->getQuery()
                        ->execute();
        
            if(count($query) != 0){
               
                     $this->form_validation->set_message('username_exists', 'Username  already exists');
                  
                return FALSE;
                }
                else
                {
                        return TRUE;
                }
    }

    public function emailexists($email){
        $error_code = -1;
        $parameters = array("email"=>$email);
        $qb = $this->em->createQueryBuilder();
            $query = $qb->select("u")
                        ->from(Users::class,"u")
                        ->where($qb->expr()->orX(
                                $qb->expr()->eq('u.email', ':email')
                                
                                   )
                                )
                    ->setParameters($parameters)
                        ->getQuery()
                        ->execute();
       
            if(count($query) != 0){
                 $this->form_validation->set_message('emailexists', 'Email  already exists');
                  return FALSE;
                }
                else
                {
                        return TRUE;
                }
            
           // return count($query) != 0;
    }
    
     public function phone_exists($phone){
       
        $parameters = array("phone"=>$phone);
        $qb = $this->em->createQueryBuilder();
            $query = $qb->select("u")
                        ->from(Users::class,"u")
                        ->where($qb->expr()->orX(
                                $qb->expr()->eq('u.phone', ':phone')
                                
                                   )
                                )
                    ->setParameters($parameters)
                        ->getQuery()
                        ->execute();
       
            if(count($query) != 0){
                 $this->form_validation->set_message('phone_exists', 'Phone number '.$phone.' already exists');
                 return FALSE;
                }
                else
                {
                        return TRUE;
                }
    }
    public function all() {
        $users = $this->user_model->getAll();

        $data['users'] = $users;
        $this->load->view("view_users", $data);
    }

    public function recoverPassword(){
         $this->load->view("header/header");
        $this->load->view("auth/forgot_password");
        $this->load->view("footer/footer");
    }
    public function login() {
        if($this->session->userdata("user_data")){
            redirect("dashboard");
            return;
        }
        if(!$this->input->post("email"))
        {
        $this->load->view("header/header");
        $this->load->view("users/login");
        $this->load->view("footer/footer");
        }else{
            $identity = $this->input->post("email");
		$password = $this->input->post("password");
                
		$remember = $this->input->post("email") != NULL ? TRUE : FALSE; // remember the user
                if($this->ion_auth->login($identity, $password, $remember)){
                    
                    $rep = $this->em->getRepository(Users::class);
                    $u = $rep->findBy(array("email"=>$identity));
                    
                    if($u){
                        $data_array = array("email"=>$u[0]->getEmail(),
                                            "user_id"=>$u[0]->getId(),
                                            "role"=>$u[0]->getGroups()[0]->getId());
                        $this->session->set_userdata("user_data",$data_array);
                    redirect("dashboard");
                    }
                }else{
                     $this->load->view("header/header");
                     $data['login_error'] = "Incorrect username or password";
                    $this->load->view("users/login",$data);
                    $this->load->view("footer/footer");
                }
           
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("user/login");
    }
    public function login_form() {

        return $this->load->view("users/login_form");
    }

    public function register_form() {

        $this->load->view("users/register_form");
    }
    
    public function update(){
        try{
        $phone = $this->input->post("phone");
        $firstName = $this->input->post("first_name");
        $lastName = $this->input->post("last_name");
        
         $userData = $this->session->userdata("user_data");
        
        
       // $rep = $this->em->getRepository(Users::class);
         $user= $this->em->find(Users::class,$userData['user_id']);
         
         $user->setPhone($phone);
         $user->setFirstName($firstName);
         $user->setLastName($lastName);
         
         $this->em->flush();
          $rep = $this->em->getRepository(Users::class);
          
                    $u = $rep->findBy(array("email"=>$userData['email']));
                    if($u){
                        $data_array = array("email"=>$u[0]->getEmail(),
                                            "user_id"=>$u[0]->getId(),
                                            "role"=>$u[0]->getGroups()[0]->getId());
                        $this->session->set_userdata("user_data",$data_array);
                    //redirect("dashboard");
                    }
        $_SESSION['message'] = "Update successful";
        $this->session->mark_as_flash('message');
              $this->session->set_flashdata("message","Update successful");
              redirect(site_url("dashboard/edit_profile"));
         
        }catch(Exception $e){
              $this->session->set_flashdata("message","Update failed");
        }
    }
    
    static $REG_ERRORS = ["Username already taken", "This email already exists","This phone number already exists"];
    static $USERNAME_EXISTS = 0;
    static $EMAIL_EXISTS = 1;
    static $PHONE_EXISTS = 2;

}
