<?php

/**
 * ArtistTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArtistTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArtistTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Artist');
    }
    
    
     public function exeArtist(Doctrine_Query $q = null)
    {
        return $this->addActiveArtistQuery($q)->execute();
    }
    
    public function addActiveArtistQuery(Doctrine_Query $q = null)
    {
        if (is_null($q))
        {
        $q = Doctrine_Query::create()
        ->from('Artist a');
        }
        
        
        return $q;
    }
    
}