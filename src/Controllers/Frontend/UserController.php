<?php 

namespace Controllers\Frontend;

use Entities\Benutzer;
use Helpers\AuthHelper;

class UserController extends AbstractBase {

	public function indexAction() {

		//Auf die Login Seite weiterleiten
		$this->redirect('login', 'user');
	}

	public function loginAction() {
		$em = $this->getEntityManager();
		
		$benutzer = new Benutzer();

		$postData = $_POST;

		if(!empty($postData)) {
			$benutzer->mapFromArray($postData);

			$userID = $em->getRepository('\Entities\Benutzer')->validateLogin($benutzer);

			if(is_numeric($userID)) {
				$this->setSuccessMessage("Hallo {$benutzer->getBenutzername()}. Sie haben sich erfolgreich angemeldet.");
				$_SESSION['benutzerID'] = $userID;

				AuthHelper::logIn($userID);
				$this->redirect(null, null, true);
			} else {
				$this->setErrorMessage("Benutzername und/oder Passwort falsch. Bitte versuchen Sie es erneut.");
			}

		}else {
			$this->setMessage("Der Mitarbeiterbereich ist nur für eingeloggte User sichtbar.");
		}
	
	}

	public function logoutAction() {
		AuthHelper::logout();

		$this->setSuccessMessage("Auf Wiedersehen! Sie wurden erfolgreich ausgeloggt");

		$this->redirect();
	}

}