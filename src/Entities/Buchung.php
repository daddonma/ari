<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 *@ORM\Entity
 *@ORM\Table(name="buchungen")
*/
class Buchung extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	* @ORM\Column(type="integer")
	*/
	protected $personenanzahl;

	/**
	* @ORM\Column(type="datetime")
	* @Gedmo\Timestampable(on="create")
	*/
	protected $buchungsdatum;

	/**
	 * @ORM\ManyToOne(targetEntity="Reise", inversedBy="buchungen")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $reise;

	/**
	 * @ORM\ManyToOne(targetEntity="Person", inversedBy="buchungen")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $person;

	public function __construct(array $data = []) {
		$this->mapFromArray($data);
	}

	/* Getter & Setter */
	public function getId() {
		return $this->id;
	}

	public function getPersonenanzahl() {
		return $this->personenanzahl;
	}

	public function setPersonenanzahl(int $personenanzahl) {
		$this->personenanzahl = $personenanzahl;
	}

	public function getBuchungsdatum() {
		return new Util\DateTime($this->buchungsdatum);
	}

	public function getReise() {
		return $this->reise;
	}

	public function setReise(Reise $reise) {
		$this->reise = $reise;
	}

	public function getPerson() {
		return $this->person;
	}

	public function setPerson(Person $person) {
		$this->person = $person;
	}

	public function getGesamtpreis() {
		return $this->personenanzahl * $this->getReise()->getPreis();
	}
	
}