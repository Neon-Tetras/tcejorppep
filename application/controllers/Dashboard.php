<?php
use models\entities\Users;
use models\entities\KYC;
use models\entities\messages\Conversations;
use models\entities\messages\Messages;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author NeonTetras
 */
class Dashboard  extends CI_Controller{
    private $em;
    private $user;
    private $data;
    private $kyc;
    function __construct() {
        parent::__construct();
        $this->load->library("doctrine");
        $this->load->helper("url");
        $this->load->library("form_validation");
        
        $this->em =  $this->doctrine->em;
        if(!$this->session->userdata("user_data")){
            redirect("user/login");
            return;
        }
        $this->data['error'] = 'my error';
        $this->data['kyc'] = null;
    
      
         $this->user = $this->em->find(Users::class,$this->session->userdata["user_id"]);
           //Fetch KYC associated with this user
      
         $qb = $this->em->createQueryBuilder();
         $this->kyc = $qb->select("kyc")
                        ->from(KYC::class, "kyc")
                        ->where( $qb->expr()->eq("kyc.user", $this->user->getId()))
                 ->getQuery()
                        ->execute();
         //$this->kyc = $rep->find(array("user_id"=>$this->user));
        
        if($this->kyc){
         $this->data['kyc'] = $this->kyc[0];
        }
         
     
    }

    
    
    public function index(){
         $this->load->view("dashboard/dashboard_header");
         $this->load->view("dashboard/dashboard_body");
         $this->load->view("dashboard/dashboard_footer");
    }
    
    
    public function inbox(){
         $this->load->view("dashboard/dashboard_header");
         $this->load->view("dashboard/messages/inbox");
         $this->load->view("dashboard/dashboard_footer");
    }
    
     public function outbox(){
         $this->load->view("dashboard/dashboard_header");
         $this->load->view("dashboard/messages/outbox");
         $this->load->view("dashboard/dashboard_footer");
    }
    
    public function send_message(){
        try{
        $this->form_validation->set_rules("subject","Subject","required|min_length[5]|max_length[255]");
        $this->form_validation->set_rules("body","Body","required|min_length[5]|max_length[255]");
        $subject = $this->input->post("subject");
        
        $isBroadcast = empty($this->input->post("isBroadcast")) ? 0 : 1;
        $r_id= $isBroadcast == 0 ? $this->input->post("recipient") : "";
        $rep = $this->em->getRepository(Users::class);
        $recipient = $rep->find(array("id"=>$r_id));
        $body = $this->input->post("body");
        
      $broadcast = $isBroadcast == 1;
        
        if($this->form_validation->run() == false){
            $this->compose_message();
        }else{
              $conversation = new Conversations();
                  if(!$broadcast){
                    $conversation->setRecipient($recipient);
                 }
            $conversation->setRecipient($recipient);
            $conversation->setSender($this->user);
            $conversation->setDate((new DateTime("now")));
            
        $msg = new Messages();
        $msg->setSubject($subject);
        $msg->setMessage($body);
        if($broadcast){
            $msg->setIsBroadcast(1);
        }
        
        $msg->setDate(new DateTime("now"));
        
        $this->em->persist($msg);
        $this->em->flush();
        
        //$rep->
        //TODO: get last insert id of  message and add to conversation
        $conversation->setMessages($msg);
        $this->em->persist($conversation);
        $this->em->flush();
        
        $_SESSION['message_sending_success'] = "Message sent successfully";
        $this->session->mark_as_flash('message_sending_success');
              $this->session->set_flashdata("message_sending_success","Message sent successfully");
              redirect(site_url("dashboard/compose_message"));
        
        
        }
        
        }catch(Exception $e){
             $_SESSION['message_sending_error'] = $e->getMessage();
        $this->session->mark_as_flash($e->getMessage());
              $this->session->set_flashdata("message_sending_error",$e->getMessage());
              redirect(site_url("dashboard/compose_message"));
        }
        
        
        
                
        
    }
    
    
    public function profile(){
        
      //  
//        echo $this->user->getId();
          $this->load->view("dashboard/dashboard_header");
          $this->data['user_data'] = $this->user;
         $this->load->view("dashboard/user_profile",$this->data);
         $this->load->view("dashboard/dashboard_footer");
    }
    
    public function compose_message(){
        $this->load->view("dashboard/dashboard_header");
        
          $this->data['all_users'] = $this->em->getRepository(Users::class)->findAll();
         $this->load->view("dashboard/messages/compose",$this->data);
         $this->load->view("dashboard/dashboard_footer");
    }
    
    public function edit_profile(){
        $this->data['user_data'] = $this->user;
        $this->load->view("dashboard/dashboard_header");
        $this->load->view("dashboard/edit_profile",$this->data);
        $this->load->view("dashboard/dashboard_footer");
    }
    
  
    
    public function update_picture()
    {
       
              

        if(!empty($_FILES['picture']['name']))
        {
            $upload = $this->_do_upload('picture');


            $data['photo'] = 'uploads/images/kyc/'.$upload;
          
          
         
         //Fetch KYC associated with this user
        // $kyc = $rep->find(Users::class,$this->user);
         if($this->data['kyc']){
             $kyc  = $this->data['kyc'];
             $kyc->setPicture($data['photo']);
             //KYC exists so update only
             $kyc->setUpdated(new DateTime("now"));
             $this->kyc = $kyc;
         $this->em->flush();
         
         }else{
             $kyc = new KYC();
             $kyc->setUser($this->user);
             $kyc->setPicture($data['photo']);
             //KYC does not exists so add new
             $kyc->setCreated(new DateTime("now"));
             $this->kyc = $kyc;
         $this->em->persist($kyc);
         
         $this->em->flush();
                 
       
         }
          $_SESSION['update_kyc'] = "Update successful";
        $this->session->mark_as_flash('update_kyc');
              $this->session->set_flashdata("update_kyc","Update successful");
              redirect(site_url("dashboard/edit_profile"));
         // redirect(site_url('dashboard/edit_profile'));
        }

        

    }

     public function update_id()
    {
       
              

        if(!empty($_FILES['idCard']['name']))
        {
            $upload = $this->_do_upload('idCard');


            $data['photo'] = 'uploads/images/kyc/'.$upload;
          
          
         
         //Fetch KYC associated with this user
        // $kyc = $rep->find(Users::class,$this->user);
         if($this->data['kyc']){
             $kyc  = $this->data['kyc'];
             $kyc->setIdCard($data['photo']);
             //KYC exists so update only
             $kyc->setUpdated(new DateTime("now"));
             $this->kyc = $kyc;
         $this->em->flush();
         
         }else{
             $kyc = new KYC();
             $kyc->setUser($this->user);
             $kyc->setIdCard($data['photo']);
             //KYC does not exists so add new
             $kyc->setCreated(new DateTime("now"));
             $this->kyc = $kyc;
         $this->em->persist($kyc);
         
         $this->em->flush();
                 
       
         }
          $_SESSION['update_kyc'] = "Update successful";
        $this->session->mark_as_flash('update_kyc');
              $this->session->set_flashdata("update_kyc","Update successful");
              redirect(site_url("dashboard/edit_profile"));
         // redirect(site_url('dashboard/edit_profile'));
        }

        

    }
    
	private function _do_upload($fieldName)
	{
		$config['upload_path']          = "uploads/images/kyc/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 900; //set max size allowed in Kilobyte
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp for unique name

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload($fieldName)) //upload and validate
        {
            $data['inputerror'][] = $fieldName;
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}
