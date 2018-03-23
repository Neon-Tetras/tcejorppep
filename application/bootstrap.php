<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyClass
 *
 * @author NeonTetras
 */



use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
//use Cerad\Bundle\CoreBundle\Doctrine\DQL\Date;




$isDevMode = true;


$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/models/entities"),$isDevMode, null, null, false);
 



 


$config->addCustomDatetimeFunction('DATE', Date::class);
$conn = array("driver" => "pdo_mysql",
    "host" => "127.0.0.1",
    "dbname"=>"pepproject",
    "user"=>"root",
    "password"=>"");

//obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
