<?php

class mainComponents extends sfComponents
{
	public function executeDictList()
	{
		$this->dict_relations = RelationTable::getDictRelations();
	}


	public function executeSearch(sfWebRequest $request)
	{
		$this->form = new SearchForm;
		$this->form->bind(array('q' => $request->getParameter('q')));
	}
}
