<?php 

namespace Controllers\Frontend;

use Doctrine\ORM\EntityManager;
use Helpers\AuthHelper;

abstract class AbstractBase extends \Controllers\AbstractBase{

	public function __construct($basePath, EntityManager $em) {
		parent::__construct($basePath, $em);
	}
	
}