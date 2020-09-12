<?php

namespace helpers;

class DateHelper {

	/**
	 * berechnet das Alter des übergebenen Geburtsdatums
	 * Geburtsdatum muss im Format: Y-m-d übergeben werden
	*/
	public static function berechneAlter($geburtstag) {

		$jahr=substr($geburtstag,0, 4);
		$monat=substr($geburtstag,5, 2);
		$tag=substr($geburtstag,8, 2);
		
		$heute=time();
		$ts=mktime(0,0,0,$monat,$tag,date("Y",$heute));  

		$alter=date("Y",$heute)-$jahr; 
		
		if ($heute<=$ts) $alter--;

		return $alter;
	}

}