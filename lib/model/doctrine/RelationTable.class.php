<?php

class RelationTable extends Doctrine_Table
{
	const
		CLASS_PATTERN = '%s%sRelation';

	protected static
		$dictRelations = array(
			'bg' => array('de', 'en'),
			'de' => array('bg', 'en'),
			'en' => array('bg', 'de'),
		);

	protected
		$firstLang     = '',
		$secondLang    = '';


	public static function getDictClass($lang1, $lang2)
	{
		$langs = self::sortLangs($lang1, $lang2);
		return sprintf(self::CLASS_PATTERN, ucfirst($langs[0]), ucfirst($langs[1]));
	}

	public static function getDictTable($lang1, $lang2)
	{
		$table = Doctrine::getTable(self::getDictClass($lang1, $lang2))
		       ->setFirstLang($lang1);

		return $table;
	}

	/**
		Sort and return language keys alphabetically.
		Used by class name generation.

		@param string $lang1 First language name
		@param string $lang2 Second language name
	*/
	protected static function sortLangs($lang1, $lang2)
	{
		$langs = array($lang1, $lang2);
		sort($langs);
		return $langs;
	}


	public static function getDictRelations()
	{
		return self::$dictRelations;
	}


	public function setFirstLang($lang)
	{
		if ( $lang == $this->secondLang ) {
			$this->secondLang = $this->firstLang;
			$this->firstLang = $lang;
		}
		return $this;
	}


	public function getByIds(array $ids)
	{
		$query = $this->getDictQuery()->whereIn('w1.id', $ids);

		return $query->fetchArray();
	}


	public function getByPrefix($prefix)
	{
		$query = $this->getDictQuery();
		if ( ! empty($prefix) && $prefix != '-' ) {
			$query->where('w1.name LIKE ?', $prefix.'%');
		}

		return $query->fetchArray();
	}


	public function getDictQuery()
	{
		return $this->createQuery('r')
			->select('r.*, w1.name AS from_word, w2.name AS to_word, w1.wp_article AS wp_article1, w2.wp_article as wp_article2')
			->leftJoin(sprintf('r.%s w1', $this->getFirstLangClass()))
			->leftJoin(sprintf('r.%s w2', $this->getSecondLangClass()))
			->orderBy('w1.name asc, w2.name asc');
	}


	public function getFirstLangClass()
	{
		return WordTable::getLangClass($this->firstLang);
	}

	public function getSecondLangClass()
	{
		return WordTable::getLangClass($this->secondLang);
	}
}
