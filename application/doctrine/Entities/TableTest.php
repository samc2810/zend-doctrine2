<?php

namespace Entities;

/**
 * TableTest
 *
 * @Table(name="table_test")
 * @Entity(repositoryClass="Entities\Repositories\TableTestRepository")
 */
class TableTest {

    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string $fname
     *
     * @Column(name="fname", type="string", length=255, nullable=false)
     */
    protected $fname;

    /**
     * @OneToMany(targetEntity="Entities\TableTest2", mappedBy="tableTest")
     */
    protected $tableTest2;

    public function getId() {
	return $this->id;
    }

    public function setId($id) {
	$this->id = $id;
    }

    public function getName() {
	return $this->name;
    }

    public function setName($name) {
	$this->name = $name;
    }

    public function getFname() {
	return $this->fname;
    }

    public function setFname($fname) {
	$this->fname = $fname;
    }

    /**
     *
     * @return \Doctrine\ORM\PersistentCollection
     */
    public function getTableTest2() {
	return $this->tableTest2;
    }

    public function setTableTest2($tableTest2) {
	$this->tableTest2 = $tableTest2;
    }

    public function __construct() {
//	$this->tableTest2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

}