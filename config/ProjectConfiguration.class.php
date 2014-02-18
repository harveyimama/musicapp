<?php

require_once 'D://xampp//htdocs//symfony-1.4.8//lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();


class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfJQueryUIPlugin');
    $this->enablePlugins('pmSuperfishMenuPlugin');
    $this->enablePlugins('tdCorePlugin');

  }
}
