<?php

/**
 * Relation form base class.
 *
 * @method Relation getObject() Returns the current form's model object
 *
 * @package    mathdict
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRelationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'from_word_id' => new sfWidgetFormInputHidden(),
      'to_word_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'from_word_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'from_word_id', 'required' => false)),
      'to_word_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'to_word_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Relation';
  }

}
