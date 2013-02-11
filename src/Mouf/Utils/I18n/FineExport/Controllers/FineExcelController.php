<?php
namespace Mouf\Utils\I18n\FineExport\Controllers;

use Mouf\Utils\I18n\Fine\Controllers\EditLabelController;

use Mouf\MoufSearchable;

use Mouf\Mvc\Splash\Controllers\Controller;

/*
 * Copyright (c) 2012 Marc Teyssier
 * 
 * See the file LICENSE.txt for copying permission.
 */

//require_once dirname(__FILE__).'/../FineMessageLanguage.php';
//require_once dirname(__FILE__).'/../views/editLabel.php';

/**
 * The controller to edit labels that are to be translated.
 *
 * @Component
 */
class FineExcelController extends EditLabelController {

	/**
	 *
	 * Export all transaltions to a excel file
	 *
	 * @Action
	 * @Logged
	 * @param string $name
	 * @param boolean $selfedit
	 */
	public function excelExport($name = "translationService", $selfedit = "false") {
		$this->msgInstanceName = $name;
		$this->selfedit =$selfedit;
	
		$array = $this->getAllMessagesFromService(($selfedit == "true"), $name);
		$this->languages = $array["languages"];
		$this->msgs = $array["msgs"];
	
		$this->loadFile(dirname(__FILE__)."/../../../../../views/excelexport.php");
		exit();
	}
	
	/**
	 *
	 * Import all transaltions to a excel file
	 *
	 * @Action
	 * @Logged
	 * @param string $name
	 * @param boolean $selfedit
	 * @param string $import
	 */
	public function excelImport($name = "translationService", $selfedit = "false", $import = null) {
	
		$this->submit = $import;
		if($this->submit) {
			$file = $_FILES["file"];
			if($file["name"]) {
				if($file["error"] == UPLOAD_ERR_OK) {
						
					$array = $this->getAllMessagesFromService(($selfedit == "true"), $name);
					$this->languages = $array["languages"];
					$founds = array();
					$associated = array();
					$row = 1;
						
					$objReader = new \PHPExcel_Reader_Excel5();
					$objPHPExcel = $objReader->load($file["tmp_name"]);
						
					$objSheet = $objPHPExcel->getSheet(0);
						
					$letter = 1;
					$language = $objSheet->getCell($this->letters[$letter]."1")->getValue();
					while($language) {
						if(array_search($language, $this->languages) !== false) {
							$num = 2;
							$key = $objSheet->getCell("A".$num)->getValue();
							while($key) {
								if(is_object($key))
									$key = $key->getPlainText();
								$element = $objSheet->getCell($this->letters[$letter].$num)->getValue();
								if(is_object($element)) {
									$translations[$language][$key] = $element->getPlainText();
								}
								else {
									$translations[$language][$key] = $element;
								}
								$num ++;
								$key = $objSheet->getCell("A".$num)->getValue();
							}
						}
						$letter ++;
						$language = $objSheet->getCell($this->letters[$letter]."1")->getValue();
					}
						
					foreach ($translations as $lang => $translation) {
						$this->setTranslationsForMessageFromService(($selfedit == "true"), $name, $lang, $translation);
					}
					header('location:'.ROOT_URL.'editLabels/missinglabels?name='.$name.'&selfedit='.$selfedit);
					exit();
						
				}
				else {
					throw new Exception("Unable to open file");
				}
			}
		}
		else {
			$this->msgInstanceName = $name;
			$this->selfedit = $selfedit;
			
			$this->content->addFile('../utils.i18n.fine-export/src/views/excelimport.php', $this);
			$this->template->toHtml();
		}
	}
	
}

?>
