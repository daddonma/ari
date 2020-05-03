<?php

namespace helpers;

class htmlHelper {

	private $em;

	public function __construct($em) {
		$this->em = $em;
	}

	public function getRegionenOptionList($selectedId = null, $showEmpty = true) {
		$list = $this->em->getRepository('Entities\Region')->findAll();
		
		if($showEmpty) {
			$html = "<option>-- Bitte wählen --</option>";
		}else {
			$html = "";
		}

		foreach($list AS $regionObj) {
		
			if($regionObj->getID() == $selectedId) {
				$selected = "selected";
			} else {
				$selected = "";
			}

			$html = "{$html}<option value='{$regionObj->getID()}' {$selected}>{$regionObj->getName()}</option>";
		}
			
		return $html;
	}

	public function getKategorienOptionList($selectedId = null, $showEmpty = true) {
		$list = $this->em->getRepository('Entities\Kategorie')->findAll();

		if($showEmpty) {
			$html = "<option>-- Bitte wählen --</option>";
		}else {
			$html = "";
		}

		foreach($list AS $kategorieObj) {
		
			if($kategorieObj->getID() == $selectedId) {
				$selected = "selected";
			} else {
				$selected = "";
			}

			$html = "{$html}<option value='{$kategorieObj->getID()}' {$selected}>{$kategorieObj->getName()}</option>";
		}

		return $html;

	}
}