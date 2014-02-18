<?php

/**
 * Artist form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArtistForm extends BaseArtistForm
{
  public function configure()
  {
      
  unset(
        $this['created_at'],$this['updated_at']
        );
  
  
        $this->widgetSchema['dob'] = new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true));
      
        $this->widgetSchema['artist_nm'] = new sfWidgetFormInputText(array('label' => 'Stage Name',));
        
        $this->widgetSchema['real_nm'] = new sfWidgetFormInputText(array('label' => 'Full Name',));
        
        //$this->widgetSchema['country_id'] = new sfWidgetFormI18nSelectCountry();
  }
      
}

