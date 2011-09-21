<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * Initialize Doctrine
     * @return Doctrine_Manager
     */
    public function _initDoctrine() {
	// include and register Doctrine's class loader
	require_once('Doctrine/Common/ClassLoader.php');
//	$classLoader->register();
	$zendLoader = Zend_Loader_Autoloader::getInstance();
	
	$classLoader = new \Doctrine\Common\ClassLoader('Doctrine',APPLICATION_PATH . '/../library/');
	$zendLoader->pushAutoloader(array($classLoader, 'loadClass'), 'Doctrine');

	$classLoader = new \Doctrine\Common\ClassLoader('Entities', realpath(__DIR__ . '/doctrine/'), 'loadClass');
	$zendLoader->pushAutoloader(array($classLoader, 'loadClass'), 'Entities');
	
	$classLoader = new \Doctrine\Common\ClassLoader('Repositories', realpath(__DIR__ . '/doctrine/'), 'loadClass');
	$zendLoader->pushAutoloader(array($classLoader, 'loadClass'), 'Repositories');
	
	$classLoader = new \Doctrine\Common\ClassLoader('Symfony', APPLICATION_PATH . '/../library/Doctrine');
	$zendLoader->pushAutoloader(array($classLoader, 'loadClass'), 'Symfony');
//	$classLoader->register();

	// create the Doctrine configuration
	$config = new \Doctrine\ORM\Configuration();

	// setting the cache ( to ArrayCache. Take a look at
	// the Doctrine manual for different options ! )
	$cache = new \Doctrine\Common\Cache\ArrayCache;
	$config->setMetadataCacheImpl($cache);
	$config->setQueryCacheImpl($cache);

	// choosing the driver for our database schema
	// we'll use annotations
	$driver = $config->newDefaultAnnotationDriver(
		APPLICATION_PATH . '/doctrine'
	);
	$config->setMetadataDriverImpl($driver);

	// set the proxy dir and set some options
	$config->setProxyDir(APPLICATION_PATH . '/doctrine/Entities/Proxies');
	$config->setAutoGenerateProxyClasses(true);
	$config->setProxyNamespace('Entities\Proxies');

	// now create the entity manager and use the connection
	// settings we defined in our application.ini
	$connectionSettings = $this->getOption('doctrine');
	$conn = array(
	    'driver' => $connectionSettings['conn']['driv'],
	    'user' => $connectionSettings['conn']['user'],
	    'password' => $connectionSettings['conn']['pass'],
	    'dbname' => $connectionSettings['conn']['dbname'],
	    'host' => $connectionSettings['conn']['host']
	);
	$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

	// push the entity manager into our registry for later use
	$registry = Zend_Registry::getInstance();
	$registry->entitymanager = $entityManager;

	return $entityManager;
    }

}

