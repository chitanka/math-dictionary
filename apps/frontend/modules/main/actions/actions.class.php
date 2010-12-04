<?php

/**
 * main actions.
 *
 * @package    mathdict
 * @subpackage main
 * @author     borislav
 * @version    SVN: $Id$
 */
class mainActions extends sfActions
{
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{
		$routing = $this->getContext()->getRouting();
		if ('homepage_noculture' == $routing->getCurrentRouteName()) {
			$this->redirect('@homepage');
		}
	}

	/**
	*
	*
	* @param sfRequest $request A request object
	*/
	public function executeList(sfWebRequest $request)
	{
		try {
			$this->dict = $this->validateDictParameter($request->getParameter('dict'));
		} catch (ErrorException $e) {
			//$this->getUser()->setFlash('error', 'You have specified an invalid dictionary.');
			$this->redirect('@homepage');
		}

		list($this->first_lang, $this->second_lang) = explode('-', $this->dict);

		$this->letter = $request->getParameter('letter');
		if ($this->letter == 'index') {
			$this->letter = '';
		}

		if ($this->letter) {
			try {
				$table = RelationTable::getDictTable($this->first_lang, $this->second_lang);
				$this->words = $table->getByPrefix($this->letter);
			} catch (Doctrine_Exception $e) {
				//$this->getUser()->setFlash('error', 'You have specified an invalid dictionary.');
				$this->redirect('@homepage');
			}
		}
	}

	/**
	* TODO see if it is possible to use only one parameter name
	*      (currently q and query are used)
	*
	* @param sfRequest $request A request object
	*/
	public function executeSearch(sfWebRequest $request)
	{
		$this->query = $request->getParameter('query');
		if (empty($this->query)) {
			$this->query = $request->getParameter('q');
		} else {
			$request->setParameter('q', $this->query);
		}

		if ($this->query) {
			$this->lists = $this->processSearch($this->query);
		}
	}


	protected function processSearch($query)
	{
		$lists = array();
		foreach (RelationTable::getDictRelations() as $firstLang => $secondLangs) {
			$ids = WordTable::getLangTable($firstLang)->getIdsByName($query);
			if ( empty($ids) ) {
				continue;
			}
			foreach ($secondLangs as $secondLang) {
				$table = RelationTable::getDictTable($firstLang, $secondLang);
				$words = $table->getByIds($ids);
				if ($words) {
					$lists[] = array(
						'first_lang'  => $firstLang,
						'second_lang' => $secondLang,
						'words'       => $words,
					);
				}
			}
		}

		return $lists;
	}


	protected function validateDictParameter($dict)
	{
		if ( ! preg_match('/^[a-z]{2}-[a-z]{2}$/', $dict) ) {
			throw new ErrorException();
		}
		return $dict;
	}

}
