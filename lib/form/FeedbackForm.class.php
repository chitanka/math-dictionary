<?php
class FeedbackForm extends BaseForm
{

	public function configure()
	{
		$this->setWidgets(array(
			'name'    => new sfWidgetFormInput(),
			'email'   => new sfWidgetFormInput(),
			'message' => new sfWidgetFormTextarea(),
		));

		$this->setValidators(array(
			'name'    => new sfValidatorString(array('required' => false)),
			'email'   => new sfValidatorEmail(
				array('required' => false),
				array('invalid' => 'The email address is invalid.')),
			'message' => new sfValidatorAnd(array(
				new sfValidatorString(
					array('min_length' => 5),
					array(
						'required' => 'The comment field is required.',
						'min_length' => 'The comment must be of %min_length% characters at least.',
					)),
				new sfValidatorCallback(array(
					'callback' => array($this, 'validateMessage')
				))
			)),
		));

		$this->widgetSchema->setLabels(array(
			'email'   => 'E-mail',
			'message' => 'Comment',
		));

		$this->widgetSchema->setNameFormat('feedback[%s]');
		$this->disableLocalCSRFProtection();
	}

	public function validateMessage($validator, $value)
	{
		if ( substr_count($value, 'http://') > 2 ) {
			throw new sfValidatorError($validator, 'There are too many URLs in the message.');
		}

		return $value;
	}

}
