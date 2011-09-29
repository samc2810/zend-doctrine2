<?php

class IndexController extends \Sam_Controller_Action {

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
//	$repo = $this->_em->find('Entities\TableTest', 1);
//	$q = $this->_em->getRepository('Entities\TableTest')->createQueryBuilder('t')->where('t.fname LIKE ?1')->setParameter(1, '%sam%')->getQuery()->getResult();
//	$repo2 = $this->_em->getRepository('Entities\TableTest')->findOneBy(array('name'=>"arora"));
//	Zend_Debug::dump(($repo));
////	Zend_Debug::dump(($repo2));
//////	Zend_Debug::dump(get_class($q));
//////	$q->setParameter(1, 'Arora');
//////	$garfield = $q->getSingleResult();
//	echo '<hr/>';
//	Zend_Debug::dump($q[0]['id']);
//	
//	$test1 = new Entities\TableTest();
//	$test1->setFname('Chick');
//	$test1->setName("Chow");
//	$this->_em->persist($test1);
//	$test2 = new Entities\TableTest2();
//	$test2->setTableTest($test1);
//	$this->_em->persist($test2);
//	
//	$this->_em->flush();
//	return;
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
//	$person = new \Entities\TablePerson();
//	$address = new \Entities\TableAddress();
//
//	$person->setName('Chow1');
//	$person->setFname('Chick2');
////	    Zend_Debug::dump($persons);
//	$address->setCity('Hamburg - Mümmel');
//	$address->setStreet('Feiningerstr 10');
////	    
//	$person->addAddress($address);
//	    $address->addPerson($person);
//	$this->_em->persist($person);
//	$this->_em->persist($address);
	$person2 = $this->_em->getReference("Entities\TablePerson", 12);
	$address2 = $this->_em->getReference("Entities\TableAddress", 12);
	
//	$this->_em->remove($person2);
//	$this->_em->remove($address2);
//	$this->_em->flush();
//	    Zend_Debug::dump($person);
//	    Zend_Debug::dump($address);
//	    $this->_em->refresh($address);
//	    Zend_Debug::dump($address);

//	Zend_Debug::dump($address->getPersons());
//	    $this->_em->clear();
////	    $this->_em->remove($address);
//	    Zend_Debug::dump($person);
//	    Zend_Debug::dump($address);
//	$person1 = $this->_em->find('Entities\TablePerson', 12);
//	$address1 = $this->_em->find('Entities\TableAddress', 17);
//	Zend_Debug::dump($address1->getPersons()->count());
//	foreach ($person1->getAddresses() as $add)
//	    Zend_Debug::dump($add);
//	echo '<hr/>';
//	echo '<hr/>';
//	Zend_Debug::dump($address1);
//	    $person1->getAddresses()->add($address1);
//	    $address1->getPersons()->add($person1);
//	$this->_em->flush();
//	Zend_Debug::dump($person);
	
	include(APPLICATION_PATH.'/test.phtml');
    }

    public function gridAction() {
//	$view = new Zend_View();
//	$view->setEncoding('UTF-8');
//        $config = new Zend_Config_Ini('./application/grids/grid.ini', 'production');
	$grid = Bvb_Grid::factory('Table');
//	$array = array(array('Alex', '12', 'M'), array('David', '1', 'M'), array('David', '2', 'M'), array('David', '3', 'M'), array('Richard', '3', 'M'), array('Lucas', '3', 'M'));
//
//	$source = new Bvb_Grid_Source_Array($array, array('name', 'age', 'sex'));
//	$source->setPrimaryKey(array('age'));
////	$grid->imagesUrl('public/images/');
//	$grid->setDetailColumns(array('age', 'name'));
//
//	$grid->setSource($source);
	$personQuery = $this->_em->getRepository("Entities\TablePerson")->createQueryBuilder('p')->addSelect('a')->innerJoin('p.addresses', 'a')->where('p.id = ?1')->setParameter(1, 26);
	Zend_Debug::dump($personQuery->getQuery()->getSQL());
	Zend_Debug::dump($personQuery->getQuery()->getArrayResult());
	$grid->setSource(new Bvb_Grid_Source_Doctrine2($personQuery, $this->_em));
//        $grid->setEscapeOutput(false);
        $grid->setExport(array('pdf', 'csv'));
        $left = new Bvb_Grid_Extra_Column();
        $left->position('left')->name('Left')->decorator("<input  type='checkbox' name='number[]' id='row:{{id}}'>");
//	$grid->setTemplate($template);
        $form = new Bvb_Grid_Form();
        $form->setBulkAdd(2)->setAdd(true)->setEdit(true)->setBulkDelete(true)->setBulkEdit(true)->setDelete(true)->setAddButton(true)->setDeleteColumn(true);;
        $form->setUseVerticalInputs(true);
        $grid->setForm($form);
//        $grid->addExtraColumns($left);
//	$grid->setView($view);
	$grid->deploy();
	$this->view->grid = $grid;
    }

}

