<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shoes
 *
 * @author NeonTetras
 */
class Shoes extends CI_Controller {
     public function index(){
         echo "shoes";
     }
     public function show($name){
         echo $name;
     }
     
     
}
