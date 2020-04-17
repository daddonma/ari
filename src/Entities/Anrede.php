<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity
 *@ORM\Table(name="anreden")
*/
class Anrede extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $bezeichnung;

	/**
	 * @ORM\OneToMany(targetEntity="Person", mappedBy="anrede")
	 */
	protected $personen;

	public function __construct(array $data = []) {
		$this->mapFromArray($data);

		$this->personen = new ArrayCollection;
	}

	public function __toString() {
		return $this->getBezeichnung();
	}

	/* Getter & Setter */

	public function getId() {
		return $this->id;
	}

	public function getBezeichnung() {
		return $this->bezeichnung;
	}

	public function setBezeichnung(string $bezeichnung) {
		$this->bezeichnung = $bezeichnung;
	}

	public function getPersonen() {
		return $this->personen;
	}

	public function addPerson(Person $person) {
		$this->personen->add($person);
	}
}