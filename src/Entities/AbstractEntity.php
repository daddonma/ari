<?php
namespace Entities;

abstract class AbstractEntity {

	public function mapFromArray(array $data) {

		if($data) {
			foreach($data AS $key => $value) {
				$fieldName = ucfirst($key);
				$setterName = "set{$fieldName}";

				if(method_exists($this, $setterName)) {
					$this->$setterName($value);
				}
			}
		}
	}

	public function mapToArray($withId = true) {
		$attributes = get_object_vars($this);

		if ($withId === false) {
			unset($attributes['id']);
		}

		 return $attributes;
	}


}