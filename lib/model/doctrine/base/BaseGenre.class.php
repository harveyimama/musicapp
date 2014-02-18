<?php

/**
 * BaseGenre
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $genre_id
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getGenreId()  Returns the current record's "genre_id" collection
 * @method Genre               setId()       Sets the current record's "id" value
 * @method Genre               setName()     Sets the current record's "name" value
 * @method Genre               setGenreId()  Sets the current record's "genre_id" collection
 * 
 * @package    musicapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGenre extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('genre_tb');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Song as genre_id', array(
             'local' => 'id',
             'foreign' => 'genre_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}