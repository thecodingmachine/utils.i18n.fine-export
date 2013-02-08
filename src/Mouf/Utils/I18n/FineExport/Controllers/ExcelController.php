<?php
namespace Mouf\Utils\I18n\FineExport\Controllers;

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
class EditLabelController extends Controller implements MoufSearchable {

	/**
	 * The default template to use for this controller (will be the mouf template)
	 *
	 * @Property
	 * @Compulsory 
	 * @var TemplateInterface
	 */
	public $template;
}

?>
