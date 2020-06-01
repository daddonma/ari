<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use Webmasters\Doctrine\ORM\Util;

/**
 *@ORM\Entity
 *@ORM\Table(name="personen")
*/
class Person extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	 * @ORM\ManyToOne(targetEntity="Anrede", inversedBy="personen")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $anrede;

	/**
	* @ORM\Column(type="string", length=50, nullable=true)
	*/
	protected $titel;

	/**
	* @ORM\Column(type="string", length=100)
	*/
	protected $vorname;

	/**
	* @ORM\Column(type="string", length=100)
	*/
	protected $nachname;

	/**
	* @ORM\Column(type="date", length=100)
	*/
	protected $geburtsdatum;

	/**
	* @ORM\Column(type="string", length=255)
	*/
	protected $strasse;

	/**
	* @ORM\Column(type="string", length=4)
	*/
	protected $hausnummer;

	/**
	* @ORM\Column(type="string", length=5)
	*/
	protected $plz;

	/**
	* @ORM\Column(type="string", length=255)
	*/
	protected $ort;

	/**
	* @ORM\Column(type="string", length=20)
	*/
	protected $telefonnummer;

	/**
	* @ORM\Column(type="string", length=100)
	*/
	protected $email;

	/**
	 * @ORM\OneToMany(targetEntity="Buchung", mappedBy="person")
	 */
	protected $buchungen;

	
	public function __construct(array $data = []) {
		$this->mapFromArray($data);

		$this->buchungen = new ArrayCollection;
	}

	public function __toString() {
		return $this->getVorname . " " . $this->getNachname();
	}

	/* Getter & Setter */

	public function getId() {
		return $this->id;
	}

	public function getAnrede() {
		return $this->anrede;
	}

	public function setAnrede(Anrede $anrede) {
		$this->anrede = $anrede;
	}

	public function getTitel() {
		return $this->titel;
	}

	public function setTitel($titel) {
		if(empty($titel)) $titel = null;

		$this->titel = $titel;
	}

	public function getVorname() {
		return $this->vorname;
	}

	public function setVorname(string $vorname) {
		$this->vorname = $vorname;
	}

	public function getNachname() {
		return $this->nachname;
	}

	public function setNachname(string $nachname) {
		$this->nachname = $nachname;
	}

	public function getGeburtsdatum() {
		return new Util\DateTime($this->geburtsdatum);
	}

	public function setGeburtsdatum($geburtsdatum) {
		$this->geburtsdatum = new Util\DateTime($geburtsdatum);
	}

	public function getStrasse() {
		return $this->strasse;
	}

	public function setStrasse(string $strasse) {
		$this->strasse = $strasse;
	}

	public function getHausnummer() {
		return $this->hausnummer;
	}

	public function setHausnummer(string $hausnummer) {
		$this->hausnummer = $hausnummer;
	}

	public function getPlz() {
		return $this->plz;
	}

	public function setPlz(string $plz) {
		$this->plz = $plz;
	}

	public function getOrt() {
		return $this->ort;
	}

	public function setOrt(string $ort) {
		$this->ort = $ort;
	}

	public function getTelefonnummer() {
		return $this->telefonnummer;
	}

	public function setTelefonnummer(string $telefonnummer) {
		$this->telefonnummer = $telefonnummer;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}

	public function getBuchungen() {
		return $this->buchungen;
	}


	public function addBuchung(Buchung $buchung) {
		$this->buchungen->add($buchung);
	}
}