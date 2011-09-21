<?php

class IndexController extends Zend_Controller_Action {

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $_em;

    public function init() {
	/* Initialize action controller here */
	parent::init();
	$registry = Zend_Registry::getInstance();
	$this->_em = $registry->entitymanager;
    }

    public function indexAction() {
	// action body
	$this->view->testvar = "test1234fff";
//	$testtable = new \Entities\TableTest();
//	$testtable->setName('Ar');
//	$testtable->setFname('Sam');
//	$this->_em->persist($testtable);
//	$this->_em->flush();
	$repo = $this->_em->find('Entities\TableTest',1);
	$q = $this->_em->getRepository('Entities\TableTest')->createQueryBuilder('t')->where('t.fname LIKE ?1')->setParameter(1, '%sam%')->getQuery()->getResult();
//	$repo2 = $this->_em->getRepository('Entities\TableTest')->findOneBy(array('name'=>"arora"));
	Zend_Debug::dump(($repo));
//	Zend_Debug::dump(($repo2));
////	Zend_Debug::dump(get_class($q));
////	$q->setParameter(1, 'Arora');
////	$garfield = $q->getSingleResult();
	echo '<hr/>';
	Zend_Debug::dump($q);
	echo '<hr/>';
//	if(!$q)
	    return;
//	$children = $q->getTableTest2();
//	Zend_Debug::dump($children);
//	
//	foreach($children as $child)
//	    Zend_Debug::dump($child->getTableTest()->getName());
	
//	$testtable2 = new \Entities\TableTest2();
//	$testtable2->setTableTest($q);
//	$this->_em->persist($testtable2);
//	$this->_em->flush();
	//var_dump($this->view);
    }

}

