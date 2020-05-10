<?php
namespace helpers;

class AuthHelper {

	public static function logIn($benutzerID) {
		if(!empty($userID)) {
			$_SESSION['benutzerID'] = $benutzerID;
		}
	}

	public static function logOut() {
		if(isset($_SESSION['benutzerID'])) {
			unset($_SESSION['benutzerID']);
		}
	}

	public static function isLoggedIn() {
		return (isset($_SESSION['benutzerID']) && is_numeric($_SESSION['benutzerID']));
	}


}