<?php

namespace Entities;

/**
 * TablePerson
 *
 * @Table(name="table_person")
 * @Entity(repositoryClass="Entities\Repositories\TablePersonRepository")
 */
class TablePerson {

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
     *
     * @var type 
     * @ManyToMany(targetEntity="Entities\TableAddress", inversedBy="persons")
     * @JoinTable(name="table_person_address",
     *      joinColumns={@JoinColumn(name="person_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="address_id", referencedColumnName="id")}
     *      )
     */
    protected $addresses;

    
    public function __construct(){
	$this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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

    public function getAddresses() {
	return $this->addresses;
    }

    public function setAddresses($addresses) {
	$this->addresses = $addresses;
    }

    public function addAddress(\Entities\TableAddress $add){
	$this->addresses[] = $add;
//	$add->addPerson($this);
    }

}

