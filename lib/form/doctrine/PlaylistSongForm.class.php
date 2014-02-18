<?php

/**
 * PlaylistSong form.
 *
 * @package    musicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PlaylistSongForm extends BasePlaylistSongForm
{
  public function configure()
  {
      unset(
        $this['created_at'],$this['updated_at']
        );
      
       $this->widgetSchema['playlist_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Playlist'),
         'query' => Doctrine_Query::create()->select('id')->from('Playlist')->Where('id = '.$this->getObject()->getPlaylistId()),
      'add_empty' => false));
      
  }
}
