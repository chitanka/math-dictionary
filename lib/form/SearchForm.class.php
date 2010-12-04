<?php
class SearchForm extends BaseForm
{

	public function configure()
	{
		$this->setWidgets(array(
			'q'  => new sfWidgetFormInput(array(), array(
				'accesskey' => 'S',
			)),
		));

		$this->setValidators(array(
			'q'  => new sfValidatorPass,
		));

		$this->widgetSchema->setLabels(array(
			'q'  => 'Search',
		));

		$this->disableLocalCSRFProtection();
	}

}
