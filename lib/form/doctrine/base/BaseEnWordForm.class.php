<?php

/**
 * EnWord form base class.
 *
 * @method EnWord getObject() Returns the current form's model object
 *
 * @package    mathdict
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEnWordForm extends WordForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['bg_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BgWord'));
    $this->validatorSchema['bg_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BgWord', 'required' => false));

    $this->widgetSchema   ['de_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'DeWord'));
    $this->validatorSchema['de_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'DeWord', 'required' => false));

    $this->widgetSchema->setNameFormat('en_word[%s]');
  }

  public function getModelName()
  {
    return 'EnWord';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['bg_words_list']))
    {
      $this->setDefault('bg_words_list', $this->object->BgWords->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['de_words_list']))
    {
      $this->setDefault('de_words_list', $this->object->DeWords->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveBgWordsList($con);
    $this->saveDeWordsList($con);

    parent::doSave($con);
  }

  public function saveBgWordsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['bg_words_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->BgWords->getPrimaryKeys();
    $values = $this->getValue('bg_words_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('BgWords', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('BgWords', array_values($link));
    }
  }

  public function saveDeWordsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['de_words_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->DeWords->getPrimaryKeys();
    $values = $this->getValue('de_words_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('DeWords', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('DeWords', array_values($link));
    }
  }

}
