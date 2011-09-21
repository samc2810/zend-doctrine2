<?php

namespace Entities;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TableTest2
 *
 * @author sarora
 * @Table(name="table_test_2")
 * @Entity(repositoryClass="Entities\Repositories\TableTest2Repository")
 */
class TableTest2 {

    //put your code here
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Unidirectional - Many to One (OWNER SIDE)
     * @ManyToOne(targetEntity="Entities\TableTest")
     * @JoinColumn(name="table_test_id", nullable=false)
     */
    protected $tableTest;

    public function getId() {
	return $this->id;
    }

    public function setId($id) {
	$this->id = $id;
    }

    /**
     *
     * @return \Entities\TableTest 
     */
    public function getTableTest() {
	return $this->tableTest;
    }

    public function setTableTest($tableTest) {
	$this->tableTest = $tableTest;
    }

}

