<?php

/**
 * BasePlaylistSong
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $playlist_id
 * @property integer $song_id
 * @property Song $Song
 * @property Playlist $Playlist
 * 
 * @method integer      getId()          Returns the current record's "id" value
 * @method integer      getPlaylistId()  Returns the current record's "playlist_id" value
 * @method integer      getSongId()      Returns the current record's "song_id" value
 * @method Song         getSong()        Returns the current record's "Song" value
 * @method Playlist     getPlaylist()    Returns the current record's "Playlist" value
 * @method PlaylistSong setId()          Sets the current record's "id" value
 * @method PlaylistSong setPlaylistId()  Sets the current record's "playlist_id" value
 * @method PlaylistSong setSongId()      Sets the current record's "song_id" value
 * @method PlaylistSong setSong()        Sets the current record's "Song" value
 * @method PlaylistSong setPlaylist()    Sets the current record's "Playlist" value
 * 
 * @package    musicapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePlaylistSong extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('playlist_song_tb');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('playlist_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('song_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Song', array(
             'local' => 'song_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Playlist', array(
             'local' => 'playlist_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}