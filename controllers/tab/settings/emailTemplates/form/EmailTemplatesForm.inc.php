<?php

/**
 * @file controllers/tab/settings/emailTemplates/form/EmailTemplatesForm.inc.php
 *
 * Copyright (c) 2014-2015 Simon Fraser University Library
 * Copyright (c) 2003-2015 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class EmailTemplatesForm
 * @ingroup controllers_tab_settings_emailTemplates_form
 *
 * @brief Form to edit email identification settings.
 */

import('lib.pkp.classes.controllers.tab.settings.form.ContextSettingsForm');

class EmailTemplatesForm extends ContextSettingsForm {

	/**
	 * Constructor.
	 */
	function EmailTemplatesForm($wizardMode = false) {
		$settings = array(
			'emailHeader' => 'string',
			'emailSignature' => 'string',
			'envelopeSender' => 'string'
		);

		$this->addCheck(new FormValidatorEmail($this, 'envelopeSender', 'optional', 'user.profile.form.emailRequired'));

		parent::ContextSettingsForm($settings, 'controllers/tab/settings/emailTemplates/form/emailTemplatesForm.tpl', $wizardMode);
	}


	//
	// Implement template methods from Form.
	//
	/**
	 * @copydoc ContextSettingsForm::fetch()
	 */
	function fetch($request) {
		$params = array('envelopeSenderDisabled' => !Config::getVar('email', 'allow_envelope_sender'));

		return parent::fetch($request, $params);
	}
}

?>
