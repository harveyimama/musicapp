<?php

/**
 * Features form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeaturesForm extends BaseFeaturesForm
{
  public function configure()
  {
     unset(
        $this['created_at'],$this['updated_at']
        );
     

     
       $this->widgetSchema['song_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Song'),
         'query' => Doctrine_Query::create()->select('id')->from('Song')->Where('id = '.$this->getObject()->getSongId()),
      'add_empty' => false));
       
       
       $this->widgetSchema['artist_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Artist'),
         'query' => Doctrine_Query::create()->select('id')->from('Artist')->Where('id <> '.$this->getObject()->getArtistId()),
      'add_empty' => false));
        
       
  }
}
