<?php
//define("APPPATH", "application");
use Doctrine\ORM\Configuration;
use Doctrine\Common\ClassLoader,
   
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
  Doctrine\ORM\Tools\Setup;

class Doctrine {

  public $em = null;

  public function __construct()
  {
    // load database configuration from CodeIgniter
    require_once APPPATH.'config/database.php';

    // Set up class loading. You could use different autoloaders, provided by your favorite framework,
    // if you want to.
    require_once APPPATH.'libraries\doctrine\common\ClassLoader.php';
    require_once APPPATH.'libraries\doctrine\DBAL\Configuration.php';
    require_once APPPATH.'libraries\doctrine\ORM\Configuration.php';
    
    $doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
    $doctrineClassLoader->register();
    $entitiesClassLoader = new ClassLoader('models', rtrim(APPPATH, "/" ));
    $entitiesClassLoader->register();

    $isDevMode = true;
    // Set up caches
    $config = new Configuration;
    $cache = new ArrayCache;
    $config->setMetadataCacheImpl($cache);
    $config = Setup::createAnnotationMetadataConfiguration(array(APPPATH.'models/entities'),$isDevMode, null, null, false);
  
    $config->setQueryCacheImpl($cache);

    $config->setQueryCacheImpl($cache);


    $config->addCustomDatetimeFunction('DATE', Date::class);
    $config->setProxyDir(APPPATH.'/models/proxies');
    $config->setProxyNamespace("models\proxies");

    

    // Database connection information
    $connectionOptions = array(
        'driver' => 'pdo_mysql',
        'user' =>     "root",
        'password' => "",
        'host' =>    "127.0.0.1",
        'dbname' =>   "pepproject"
    );

    // Create EntityManager
    $this->em = EntityManager::create($connectionOptions, $config);
  }
  
  function getEntityManager(){
      return $this->em;
  }
}