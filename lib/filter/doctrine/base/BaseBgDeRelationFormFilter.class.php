<?php

/**
 * BgDeRelation filter form base class.
 *
 * @package    mathdict
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBgDeRelationFormFilter extends RelationFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('bg_de_relation_filters[%s]');
  }

  public function getModelName()
  {
    return 'BgDeRelation';
  }
}
