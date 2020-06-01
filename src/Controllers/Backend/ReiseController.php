<?php 

namespace Controllers\Backend;

use Entities\Reise;
use Entities\Kategorie;
use Entities\Region;

use helpers\HtmlHelper;
use helpers\uploadHelper;

class ReiseController extends AbstractBase {

	public function indexAction() {
		$em =  $this->getEntityManager();

		$query = $em
         			->createQueryBuilder()
         			->select('r')
         			->from('Entities\Reise', 'r')
         			->orderBy('r.titel', 'ASC')
         			->getQuery();

        $reisen = $query->getResult();
        $this->addContext('reisen', $reisen);

	}

	public function insertAction() {
		$em = $this->getEntityManager();

		$reise = new Reise();

		$postData = $_POST;
		
		if(!empty($postData)) {

			$files = $_FILES;


			if(!empty($files['vorschaubild']['name'])) {
				$postData['vorschaubild'] = $files['vorschaubild']['name'];
			} 

			if(!empty($files['detailbild']['name'])) {
				$postData['detailbild'] = $files['detailbild']['name'];
			} 	

			$reise->mapFromArray($postData);
			
			if(isset($postData['kategorieID'])) {
                $kategorie = $em->getRepository('Entities\Kategorie')->find($postData['kategorieID']);
                $kategorie->addReise($reise);
                $reise->setKategorie($kategorie);
            }    

            if(isset($postData['regionID'])) {
                $region = $em->getRepository('Entities\Region')->find($postData['regionID']);
                $region->addReise($reise);
                $reise->setRegion($region);
            }     

			$validator = $em->getValidator($reise);
				
			if($validator->isValid()) {
				$em->persist($reise);
				$em->flush();
				$reiseID = $reise->getID();
				$uploadsDir = UPLOADS_DIR;

				//das Dokument abspeichern
				$uploadHelper = new uploadHelper();

				$vorschaubildDir = "{$uploadsDir}/reisen/{$reiseID}/vorschau";
				$detailbildDir =  "{$uploadsDir}/reisen/{$reiseID}/detail";
				
				//das vorschaubild abspeichern
				$uploadHelper->moveFile($files['vorschaubild']['tmp_name'], $vorschaubildDir, $reise->getVorschaubild());
				$uploadHelper->moveFile($files['detailbild']['tmp_name'], $detailbildDir, $reise->getDetailbild());

				$this->setSuccessMessage('Reise wurde erfolgreich angelegt');

				//auf die Indexseite der Reise weiterleiten
        		$this->redirect('index', 'reise');
			} else {
				$this->setErrorMessage("Fehler beim Anlegen der Reise", $validator->getErrors());
			}
		}
	

		$htmlHelper = new HtmlHelper($em);
		
		$regionenOptionList = $htmlHelper->getRegionenOptionList($reise->getRegion()->getID());
		$kategorienOptionList = $htmlHelper->getKategorienOptionList($reise->getKategorie()->getID());

		$this->addContext('reise', $reise);
		$this->addContext('regionenOptionList', $regionenOptionList);
		$this->addContext('kategorienOptionList', $kategorienOptionList);
	}

	public function updateAction() {
		$em = $this->getEntityManager();

		$reiseID = $_GET['id'];

		$reise = $em->getRepository('Entities\Reise')->find($reiseID);

		$postData =  $_POST;

		if(!empty($postData)) {

			$uploadsDir = UPLOADS_DIR;

			$oldVorschaubild = $reise->getVorschaubild();
			$oldDetailbild = $reise->getDetailbild();

			$vorschaubildDir = "{$uploadsDir}/reisen/{$reiseID}/vorschau";
			$detailbildDir = "{$uploadsDir}/reisen/{$reiseID}/detail";

			$oldVorschaubildPath = "{$vorschaubildDir}/{$oldVorschaubild}";
			$oldDetailbildPath= "{$detailbildDir}/{$oldDetailbild}";

			$vorschaubildChanged = false;
			$files = $_FILES;
			if(!empty($files['vorschaubild']['name'])) {
				$postData['vorschaubild'] = $files['vorschaubild']['name'];
				$vorschaubildChanged = true;

			} 

			$detailbildChanged = false;
			if(!empty($files['detailbild']['name'])) {
				$postData['detailbild'] = $files['detailbild']['name'];
				$detailbildChanged = true;
			} 	


			$reise->mapFromArray($postData);
			
			if(isset($postData['kategorieID'])) {
                $kategorie = $em->getRepository('Entities\Kategorie')->find($postData['kategorieID']);
                $kategorie->addReise($reise);
                $reise->setKategorie($kategorie);
            }    

            if(isset($postData['regionID'])) {
                $region = $em->getRepository('Entities\Region')->find($postData['regionID']);
                $region->addReise($reise);
                $reise->setRegion($region);
            }   

            $validator = $em->getValidator($reise);

            if($validator->isValid()) {
				$em->persist($reise);
				$em->flush();

				//das Dokument abspeichern
				$uploadHelper = new uploadHelper();

				if($vorschaubildChanged) {

					//Das alte Bild löschen
					$uploadHelper->deleteFile($oldVorschaubildPath);

					//das neue Bild speichern
					$uploadHelper->moveFile($files['vorschaubild']['tmp_name'], $vorschaubildDir, $reise->getVorschaubild());
				}

				if($detailbildChanged) {

					//Das alte Bild löschen
					$uploadHelper->deleteFile($oldDetailbildPath);

					//das neue Bild speichern
					$uploadHelper->moveFile($files['detailbild']['tmp_name'], $detailbildDir, $reise->getDetailbild());
				}

				$this->setSuccessMessage('Reise wurde erfolgreich bearbeitet');
			} else {
				$this->setErrorMessage("Fehler beim Speichern der Reise", $validator->getErrors());
			}

		}	

		$htmlHelper = new HtmlHelper($em);
		
		$regionenOptionList = $htmlHelper->getRegionenOptionList($reise->getRegion()->getID());
		$kategorienOptionList = $htmlHelper->getKategorienOptionList($reise->getKategorie()->getID());

		$this->addContext('reise', $reise);
		$this->addContext('regionenOptionList', $regionenOptionList);
		$this->addContext('kategorienOptionList', $kategorienOptionList);
		
	}

	public function deleteAction() {
		$em = $this->getEntityManager();

		$reiseID = $_GET['id'];

		$reise = $em->getRepository('Entities\Reise')->find($reiseID);


        if(isset($_POST['confirm'])) {
            $em->remove($reise);
            $em->flush();

            //Bilder löschen
            $uploadHelper = new uploadHelper();
            $uploadsDir = UPLOADS_DIR;

			$vorschaubild = $reise->getVorschaubild();
			$detailbild = $reise->getDetailbild();

			$vorschaubildDir = "{$uploadsDir}/reisen/{$reiseID}/vorschau/{$vorschaubild}";
			$detailbildDir = "{$uploadsDir}/reisen/{$reiseID}/detail/{$detailbild}";

			$uploadHelper::deleteFile($vorschaubildDir);
			$uploadHelper::deleteFile($detailbildDir);

            $this->setMessage("Reise wurde erfolgreich gelöscht");
            
            //auf die Indexseite der Reise weiterleiten
        	$this->redirect('index', 'reise');

        }

		$this->setMessage('Bitte bestätigen Sie das Löschen der folgenden Reise: ');

		$this->addContext('reise', $reise);

	}
}