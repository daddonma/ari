<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity
 *@ORM\Table(name="benutzer")
*/
class Benutzer extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	* @ORM\Column(type="string")
	*/
	protected $benutzername;

	/**
	* @ORM\Column(type="string")
	*/
	protected $passwort;


	public function __construct(array $data = []) {
		$this->mapFromArray($data);
	}

	public function __toString() {
		return $this->getBenutzername();
	}

	/* Getter & Setter */

	public function getId() {
		return $this->id;
	}

	public function getBenutzername() {
		return $this->benutzername;
	}

	public function setBenutzername(string $benutzername) {
		$this->benutzername = $benutzername;
	}


	public function getPasswort() {
		return $this->passwort;
	}

	public function setPasswort(string $passwort) {
		$this->passwort = $passwort;
	}
}