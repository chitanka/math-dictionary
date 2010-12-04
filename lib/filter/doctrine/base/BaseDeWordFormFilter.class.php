<?php

/**
 * DeWord filter form base class.
 *
 * @package    mathdict
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDeWordFormFilter extends WordFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['bg_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BgWord'));
    $this->validatorSchema['bg_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BgWord', 'required' => false));

    $this->widgetSchema   ['en_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'EnWord'));
    $this->validatorSchema['en_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EnWord', 'required' => false));

    $this->widgetSchema->setNameFormat('de_word_filters[%s]');
  }

  public function addBgWordsListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('BgDeRelation.bg_word_id', $values);
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

    $query->leftJoin('r.DeEnRelation DeEnRelation')
          ->andWhereIn('DeEnRelation.en_word_id', $values);
  }

  public function getModelName()
  {
    return 'DeWord';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'bg_words_list' => 'ManyKey',
      'en_words_list' => 'ManyKey',
    ));
  }
}
