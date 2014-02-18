<?php

/**
 * PlugintdTrackTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    tdAudioPlugin
 * @subpackage model
 * @author     Tomasz Ducin <tomasz.ducin@gmail.com>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class PlugintdTrackTable extends Doctrine_Table
{
  static public function getAllAlbumTracksByIdSortedQuery($id)
  {
        return Doctrine_Query::create()
             ->from('tdTrack t')
             ->where('t.td_track_album_id = ?', $id)
             ->orderBy('t.position');
  }
}