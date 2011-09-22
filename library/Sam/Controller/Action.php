<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Action
 *
 * @author sarora
 */
class Sam_Controller_Action extends Zend_Controller_Action {
    //put your code here
    
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em;

    public function init() {
	/* Initialize action controller here */
	parent::init();
	$registry = Zend_Registry::getInstance();
	$this->_em = $registry->entitymanager;
    }
}
