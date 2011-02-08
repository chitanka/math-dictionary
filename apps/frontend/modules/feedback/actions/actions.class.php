<?php

/**
 * feedback actions.
 *
 * @package    mathdict
 * @subpackage feedback
 * @author     borislav
 * @version    SVN: $Id$
 */
class feedbackActions extends sfActions
{
	/**
	* Show the feedback form and process a POST request if any.
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{
		$this->form = new FeedbackForm;

		if ($request->isMethod('post')) {
			$this->form->bindRequest($request);

			if ($this->form->isValid()) {
				$this->processFeedback($this->form->getValues());
				$this->redirect('@feedback_thankyou');
			}
		}
	}


	public function executeThankyou()
	{
	}


	protected function processFeedback($data)
	{
		if ('' == $data['name']) $data['name'] = 'Anonymous';
		if ('' == $data['email']) $data['email'] = 'anon@anon.net';

		$sender = array($data['email'] => $data['name']);
		$message = Swift_Message::newInstance()
			->setFrom($sender)
			->setTo(sfConfig::get('app_admin_email'))
			->setSubject('Feedback from math dictionary')
			->setBody($data['message']);
		$headers = $message->getHeaders();
		$headers->addMailboxHeader('Reply-To', $sender);

		$this->getMailer()->send($message);
	}
}
