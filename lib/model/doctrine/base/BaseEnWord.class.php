<?php

/**
 * BaseEnWord
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property Doctrine_Collection $BgWords
 * @property Doctrine_Collection $DeWords
 * @property Doctrine_Collection $BgEnRelations
 * @property Doctrine_Collection $DeEnRelations
 *
 * @method Doctrine_Collection getBgWords()       Returns the current record's "BgWords" collection
 * @method Doctrine_Collection getDeWords()       Returns the current record's "DeWords" collection
 * @method Doctrine_Collection getBgEnRelations() Returns the current record's "BgEnRelations" collection
 * @method Doctrine_Collection getDeEnRelations() Returns the current record's "DeEnRelations" collection
 * @method EnWord              setBgWords()       Sets the current record's "BgWords" collection
 * @method EnWord              setDeWords()       Sets the current record's "DeWords" collection
 * @method EnWord              setBgEnRelations() Sets the current record's "BgEnRelations" collection
 * @method EnWord              setDeEnRelations() Sets the current record's "DeEnRelations" collection
 *
 * @package    mathdict
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseEnWord extends Word
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('en_word');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BgWord as BgWords', array(
             'refClass' => 'BgEnRelation',
             'local' => 'to_word_id',
             'foreign' => 'id'));

        $this->hasMany('DeWord as DeWords', array(
             'refClass' => 'DeEnRelation',
             'local' => 'to_word_id',
             'foreign' => 'id'));

        $this->hasMany('BgEnRelation as BgEnRelations', array(
             'local' => 'id',
             'foreign' => 'to_word_id'));

        $this->hasMany('DeEnRelation as DeEnRelations', array(
             'local' => 'id',
             'foreign' => 'to_word_id'));
    }
}