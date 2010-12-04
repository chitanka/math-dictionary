<?php

/**
 * BgDeRelation form base class.
 *
 * @method BgDeRelation getObject() Returns the current form's model object
 *
 * @package    mathdict
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBgDeRelationForm extends RelationForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('bg_de_relation[%s]');
  }

  public function getModelName()
  {
    return 'BgDeRelation';
  }

}
