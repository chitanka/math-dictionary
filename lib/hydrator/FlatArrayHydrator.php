<?php
class FlatArrayHydrator extends Doctrine_Hydrator_Abstract
{
	public function hydrateResultSet($stmt)
	{
		$array = array();
		foreach ($stmt->fetchAll(Doctrine_Core::FETCH_NUM) as $result) {
			$array[] = $result[0];
		}

		return $array;
	}
}
