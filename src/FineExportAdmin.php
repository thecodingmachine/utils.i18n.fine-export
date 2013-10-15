<?php
/*
 * Copyright (c) 2012 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

use Mouf\MoufManager;
use Mouf\MoufUtils;

MoufUtils::registerMainMenu('htmlMainMenu', 'HTML', null, 'mainMenu', 40);
MoufUtils::registerMenuItem('htmlFineMainMenu', 'Fine', null, 'htmlMainMenu', 10);
MoufUtils::registerChooseInstanceMenuItem('htmlFineExportTranslationMenuItem', 'Export Excel', 'fineExport/excelExport', "Mouf\\Utils\\I18n\\Fine\\Translate\\FinePHPArrayTranslationService", 'htmlFineMainMenu', 40);
MoufUtils::registerChooseInstanceMenuItem('htmlFineImportTranslationMenuItem', 'Import Excel', 'fineExport/excelImport', "Mouf\\Utils\\I18n\\Fine\\Translate\\FinePHPArrayTranslationService", 'htmlFineMainMenu', 50);

/*
use Mouf\MoufManager;
use Mouf\MoufUtils;

MoufUtils::registerMainMenu('htmlMainMenu', 'HTML', null, 'mainMenu', 40);
MoufUtils::registerMenuItem('htmlFineMainMenu', 'Fine', null, 'htmlMainMenu', 10);


/*MoufUtils::registerChooseInstanceMenuItem('htmlFineEditTranslationMenuItem', 'Edit translations', 'mouf/editLabels/missinglabels?name=translationService', 'htmlFineMainMenu', 10);
MoufUtils::registerChooseInstanceMenuItem('htmlFineEditTranslationAnyInstanceMenuItem', 'Edit translations (any instance)', 'javascript:chooseInstancePopup("FinePHPArrayTranslationService", "'.ROOT_URL.'mouf/editLabels/missinglabels?name=", "'.ROOT_URL.'")', 'htmlFineMainMenu', 20);
MoufUtils::registerChooseInstanceMenuItem('htmlFineSupportedLanguagesMenuItem', 'Supported languages', 'javascript:chooseInstancePopup("FinePHPArrayTranslationService", "'.ROOT_URL.'mouf/editLabels/supportedLanguages?name=", "'.ROOT_URL.'")', 'htmlFineMainMenu', 30);
MoufUtils::registerChooseInstanceMenuItem('htmlFineEnableDisable2MenuItem', 'Enable/Disable translation', 'mouf/editLabels/', 'htmlFineMainMenu', 40);
MoufUtils::registerChooseInstanceMenuItem('htmlFineImportCSV2MenuItem', 'Import/Export', 'javascript:chooseInstancePopup("FinePHPArrayTranslationService", "'.ROOT_URL.'mouf/editLabels/excelimport?name=", "'.ROOT_URL.'")', 'htmlFineMainMenu', 50);*/

// Controller declaration
/*
MoufManager::getMoufManager()->declareComponent('editLabels', 'Mouf\\Utils\\I18n\\Fine\\Controllres\\,EditLabelController', true);
MoufManager::getMoufManager()->bindComponents('editLabels', 'template', 'moufTemplate');
*/


$moufManager = MoufManager::getMoufManager();
$moufManager->declareComponent('fineExport', 'Mouf\\Utils\\I18n\\FineExport\\Controllers\\FineExcelController', true);
$moufManager->bindComponents('fineExport', 'template', 'moufTemplate');
$moufManager->bindComponents('fineExport', 'content', 'block.content');
?>