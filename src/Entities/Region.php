<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity
 *@ORM\Table(name="regionen")
*/
class Region extends AbstractEntity {

	/**
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 *@ORM\Column(type="integer")
	*/
	protected $id = 0;

	/**
	* @ORM\Column(type="string", length=100)
	*/
	protected $name;

	/**
	 * @ORM\OneToMany(targetEntity="Reise", mappedBy="region")
	 */
	protected $reisen;

	public function __construct($data = []) {
		$this->mapFromArray($data);

		$this->reisen = new ArrayCollection;
	}

	public function __toString() {
		return $this->getName();
	}

	/* Getter & Setter */

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getReisen() {
		return $this->reisen;
	}
	
	public function addReise($reise) {
		$this->reisen->add($reise);
	}
}