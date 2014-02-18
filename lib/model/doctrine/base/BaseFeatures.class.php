<?php

/**
 * BaseFeatures
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $song_id
 * @property integer $artist_id
 * @property Song $Song
 * @property Artist $Artist
 * 
 * @method integer  getId()        Returns the current record's "id" value
 * @method integer  getSongId()    Returns the current record's "song_id" value
 * @method integer  getArtistId()  Returns the current record's "artist_id" value
 * @method Song     getSong()      Returns the current record's "Song" value
 * @method Artist   getArtist()    Returns the current record's "Artist" value
 * @method Features setId()        Sets the current record's "id" value
 * @method Features setSongId()    Sets the current record's "song_id" value
 * @method Features setArtistId()  Sets the current record's "artist_id" value
 * @method Features setSong()      Sets the current record's "Song" value
 * @method Features setArtist()    Sets the current record's "Artist" value
 * 
 * @package    musicapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFeatures extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('features_tb');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('song_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('artist_id', 'integer', null, array(
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

        $this->hasOne('Artist', array(
             'local' => 'artist_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}