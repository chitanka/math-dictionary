<?php

/**
 * BgWord filter form base class.
 *
 * @package    mathdict
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBgWordFormFilter extends WordFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['de_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'DeWord'));
    $this->validatorSchema['de_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'DeWord', 'required' => false));

    $this->widgetSchema   ['en_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'EnWord'));
    $this->validatorSchema['en_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EnWord', 'required' => false));

    $this->widgetSchema->setNameFormat('bg_word_filters[%s]');
  }

  public function addDeWordsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.BgDeRelation BgDeRelation')
          ->andWhereIn('BgDeRelation.de_word_id', $values);
  }

  public function addEnWordsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.BgEnRelation BgEnRelation')
          ->andWhereIn('BgEnRelation.en_word_id', $values);
  }

  public function getModelName()
  {
    return 'BgWord';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'de_words_list' => 'ManyKey',
      'en_words_list' => 'ManyKey',
    ));
  }
}
