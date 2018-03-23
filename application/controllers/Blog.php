<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author NeonTetras
 */
class Blog extends CI_Controller{
    //put your code here
    public function index(){
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
        $data['title'] = "My Real Title";
                $data['heading'] = "My Real Heading";
                $data['message'] = "Message me";
         $this->load->view("blog_view",$data);
         
    }
    
    public function search($param,$id){
        echo sprintf("%s %s",$param,$id);
    }
    
    public function test(){
        $data = array(
        'title' => 'My Title',
        'heading' => 'My Heading',
        'message' => 'My Message'
);
//        $this->load->view("blog_view.html",$data);
        $this->load->view("welcome_message",$data);
    }
    
//    public function _output($output){
//        echo $output." cool";
//    }
}
