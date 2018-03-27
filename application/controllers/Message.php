<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author NeonTetras
 */
class Message extends CI_Controller{
    protected function index(){
        return $this->load->view("dashboard/messages/compose");
    }
}
