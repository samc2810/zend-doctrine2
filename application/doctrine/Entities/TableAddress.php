<?php
namespace Entities;

/**
 * TablePerson
 *
 * @Table(name="table_address")
 * @Entity(repositoryClass="Entities\Repositories\TableAddressRepository")
 */
class TableAddress {
    //put your code here
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
     * @var string 
     *
     * @Column(name="street", type="string", length=255, nullable=false)
     */
    protected $street;
    
    
    /**
     * @var string 
     *
     * @Column(name="city", type="string", length=255, nullable=false)
     */
    protected $city;

    /**
     *
     * @var type 
     * @ManyToMany(targetEntity="Entities\TablePerson", mappedBy="addresses")
     */
    protected $persons;
    
    public function __construct(){
	$this->persons = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
	return $this->id;
    }

    public function setId($id) {
	$this->id = $id;
    }

    public function getStreet() {
	return $this->street;
    }

    public function setStreet($street) {
	$this->street = $street;
    }

    public function getCity() {
	return $this->city;
    }

    public function setCity($city) {
	$this->city = $city;
    }

    public function getPersons() {
	return $this->persons;
    }

    public function setPersons($persons) {
	$this->persons = $persons;
    }

    
    public function addPerson(\Entities\TablePerson $per){
	$this->persons[] = $per;
    }

}
