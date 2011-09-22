<?php

class IndexController extends Sam_Controller_Action {

    public function init() {
	/* Initialize action controller here */
	parent::init();
    }

    public function indexAction() {
	// action body
	$this->view->testvar = "test1234fff";
//	$testtable = new \Entities\TableTest();
//	$testtable->setName('Ar');
//	$testtable->setFname('Sam');
//	$this->_em->persist($testtable);
//	$this->_em->flush();
	$repo = $this->_em->find('Entities\TableTest', 1);
	$q = $this->_em->getRepository('Entities\TableTest')->createQueryBuilder('t')->where('t.fname LIKE ?1')->setParameter(1, '%sam%')->getQuery()->getResult();
//	$repo2 = $this->_em->getRepository('Entities\TableTest')->findOneBy(array('name'=>"arora"));
//	Zend_Debug::dump(($repo));
////	Zend_Debug::dump(($repo2));
//////	Zend_Debug::dump(get_class($q));
//////	$q->setParameter(1, 'Arora');
//////	$garfield = $q->getSingleResult();
//	echo '<hr/>';
	Zend_Debug::dump($q);
//	echo '<hr/>';
//	if(!$q)
//	    return;
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
//	    $person = new \Entities\TablePerson();
//	    $address = new \Entities\TableAddress();
//	    
//	    $person->setName('Arora22ggg2');
//	    $person->setFname('Samirddd111');
////	    Zend_Debug::dump($persons);
//	    $address->setCity('Hamburg - Billstedt');
//	    $address->setStreet('Feiningerstr 10d22211');
////	    
////	    
//	    $this->_em->persist($person);
//	    $this->_em->persist($address);
//	    $this->_em->flush();
//	    $this->_em->clear();
////	    $this->_em->remove($address);
//	    Zend_Debug::dump($person);
//	    Zend_Debug::dump($address);
	$person1 = $this->_em->find('Entities\TablePerson', 12);
	$address1 = $this->_em->find('Entities\TableAddress', 12);
//	Zend_Debug::dump($person1->getAddresses());
	foreach ($person1->getAddresses() as $add)
	    Zend_Debug::dump($add);
	echo '<hr/>';
	echo '<hr/>';
	Zend_Debug::dump($address1);
//	    $person1->getAddresses()->add($address1);
//	    $address1->getPersons()->add($person1);
//	$this->_em->flush();

//	Zend_Debug::dump($person);
    }

}

