<?php

/**
 * Story form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoryForm extends BaseStoryForm
{
  public function configure()
  {
      unset(
        $this['created_at'],$this['updated_at']
        );
      
      $this->widgetSchema['story'] = new sfWidgetFormTextarea(array(), array('rows' => '15','cols' => '90'));
  }
}
