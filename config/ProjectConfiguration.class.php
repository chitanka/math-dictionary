<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
		$this->enablePlugins(array(
			'sfDoctrinePlugin',
			'sfSuperCachePlugin',
		));
	  $this->enablePlugins('sfLanguageSwitchPlugin');
  }

	public function configureDoctrine(Doctrine_Manager $manager)
	{
		$manager->registerHydrator('flat_array', 'FlatArrayHydrator');
	}
}
