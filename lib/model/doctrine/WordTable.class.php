<?php

class WordTable extends Doctrine_Table
{
	const
		CLASS_PATTERN = '%sWord';


	public static function getLangClass($lang)
	{
		return sprintf(self::CLASS_PATTERN, ucfirst($lang));
	}

	public static function getLangTable($lang)
	{
		return Doctrine::getTable(self::getLangClass($lang));
	}


	public function getIdsByName($name)
	{
		return $this->createQuery()
			->select('id')
			->where('name LIKE ?', '%'.$name.'%')
			->execute(array(), 'flat_array');
	}

}