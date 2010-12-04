<?php

/**
 * BgWord form base class.
 *
 * @method BgWord getObject() Returns the current form's model object
 *
 * @package    mathdict
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseBgWordForm extends WordForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['de_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'DeWord'));
    $this->validatorSchema['de_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'DeWord', 'required' => false));

    $this->widgetSchema   ['en_words_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'EnWord'));
    $this->validatorSchema['en_words_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EnWord', 'required' => false));

    $this->widgetSchema->setNameFormat('bg_word[%s]');
  }

  public function getModelName()
  {
    return 'BgWord';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['de_words_list']))
    {
      $this->setDefault('de_words_list', $this->object->DeWords->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['en_words_list']))
    {
      $this->setDefault('en_words_list', $this->object->EnWords->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveDeWordsList($con);
    $this->saveEnWordsList($con);

    parent::doSave($con);
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

  public function saveEnWordsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['en_words_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->EnWords->getPrimaryKeys();
    $values = $this->getValue('en_words_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('EnWords', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('EnWords', array_values($link));
    }
  }

}
