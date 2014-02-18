<?php

/**
 * BasetdConfig
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $value
 * @property string $description
 * 
 * @method string   getName()        Returns the current record's "name" value
 * @method string   getValue()       Returns the current record's "value" value
 * @method string   getDescription() Returns the current record's "description" value
 * @method tdConfig setName()        Sets the current record's "name" value
 * @method tdConfig setValue()       Sets the current record's "value" value
 * @method tdConfig setDescription() Sets the current record's "description" value
 * 
 * @package    musicapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasetdConfig extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('td_config');
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('value', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));


        $this->index('name_unique', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
             ));
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}