<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity
 *@ORM\Table(name="reisen")
*/
class Reise extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	* @ORM\Column(type="string", length=100)
	*/
	protected $titel;

	/**
	* @ORM\Column(type="date")
	*/
	protected $beginn;

	/**
	* @ORM\Column(type="date")
	*/
	protected $ende;

	/**
	* @ORM\Column(type="decimal")
	*/
	protected $preis;

	/**
	* @ORM\Column(type="string")
	*/
	protected $kurzbeschreibung;

	/**
	* @ORM\Column(type="string")
	*/
	protected $detailbild;

	/**
	* @ORM\Column(type="string")
	*/
	protected $vorschaubild;

	/**
	 * @ORM\ManyToOne(targetEntity="Kategorie", inversedBy="reisen")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $kategorie;

	/**
	 * @ORM\ManyToOne(targetEntity="Region", inversedBy="reisen")
	 * @ORM\JoinColumn(nullable=false)
	 */
	protected $region;

	/**
	 * @ORM\OneToMany(targetEntity="Buchung", mappedBy="reisen")
	 */
	protected $buchungen;

	public function __construct(array $data = []) {

		$this->mapFromArray($data);

		$this->kategorie = new Kategorie;

		$this->region = new Region;

		$this->buchungen = new ArrayCollection;
	}

	public function __toString() {
		return $this->getTitel();
	}

	/* Getter & Setter */

	public function getId() {
		return $this->id;
	}

	public function getTitel() {
		return $this->titel;
	}

	public function setTitel(string $titel) {
		$this->titel = $titel;
	}

	public function getBeginn() {
		return new Util\DateTime($this->beginn);
	}

	public function setBeginn($beginn) {
		$this->beginn = new Util\DateTime($beginn);
	}

	public function getEnde() {
		return new Util\DateTime($this->ende);
	}

	public function setEnde($ende) {
		$this->ende = new Util\DateTime($ende);
	}

	public function setPreis($preis) {
		$this->preis = $preis;
	}

	public function getPreis() {
		return $this->preis;
	}

	public function getKurzbeschreibung() {
		return $this->kurzbeschreibung;
	}

	public function setKurzbeschreibung(string $kurzbeschreibung) {
		$this->kurzbeschreibung = $kurzbeschreibung;
	}

	public function getDetailbild() {
		return $this->detailbild;
	}

	public function setDetailbild(string $detailbild) {
		$this->detailbild = $detailbild;
	}

	public function getVorschaubild() {
		return $this->vorschaubild;
	}

	public function setVorschaubild(string $vorschaubild) {
		$this->vorschaubild = $vorschaubild;
	}


	public function getKategorie() {
		return $this->kategorie;
	}

	public function setKategorie(Kategorie $kategorie) {
		$this->kategorie = $kategorie;
	}

	public function getRegion() {
		return $this->region;
	}

	public function setRegion(Region $region) {
		$this->region = $region;
	}

	public function getBuchungen() {
		return $this->buchungen;
	}

	public function addBuhung(Buchung $buchung) {
		$this->buchungen->add($buchung);
	}
}