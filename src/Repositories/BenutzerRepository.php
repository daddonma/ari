<?php 

namespace Repositories;

use Doctrine\ORM\EntityRepository;

use \Entities\Benutzer;

class BenutzerRepository extends EntityRepository {

	public function validateLogin(Benutzer $benutzer) {

		$em = $this->getEntityManager();

		$user = $em
			->getRepository(Benutzer::class)
			->findOneBy(['benutzername' => $benutzer->getBenutzername(),'passwortHash' => $benutzer->getPasswortHash()]); 

		//Kein Benutzer gefunden => null zurückgeben, andernfalls die jeweilige ID des Benutzers
		return (empty($user)) ? null : $user->getId();
	
	}
}