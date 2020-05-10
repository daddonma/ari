<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity(repositoryClass="Repositories\BenutzerRepository")
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
	* @ORM\Column(name="passwort_hash",type="string")
	*/
	protected $passwortHash;


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


	public function getPasswortHash() {
		return $this->passwortHash;
	}

	public function setPasswortHash(string $passwortHash) {
		$this->passwortHash = $passwortHash;
	}

	public function setPasswort(string $passwort) {
		$this->setPasswortHash(sha1($passwort));
	}
}