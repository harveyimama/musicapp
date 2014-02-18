<?php

/**
 * Album form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlbumForm extends BaseAlbumForm
{
  public function configure()
  {
      unset(
        $this['created_at'],$this['updated_at']
        );
      
      
         $this->widgetSchema['release_dt'] = new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true,'label' => 'Release Date'));
         
         $this->widgetSchema['album_nm'] = new sfWidgetFormInputText(array('label' => 'Title',));
         
   
        $this->widgetSchema['artist_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Artist'),
         'query' => Doctrine_Query::create()->select('id')->from('Artist')->Where('id = '.$this->getObject()->getArtistId()),
      'add_empty' => false));
  }
}
