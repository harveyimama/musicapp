<?php

/**
 * FeaturesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FeaturesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object FeaturesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Features');
    }
    
     public function countFeatures(Doctrine_Query $q = null)
    {
        return $this->addActiveFeaturesQuery($q)->count();
    }
    
   
    
    
     public function exeFeatures(Doctrine_Query $q = null)
    {
        return $this->addActiveFeaturesQuery($q)->execute();
    }
    
    public function addActiveFeaturesQuery(Doctrine_Query $q = null)
    {
        if (is_null($q))
        {
        $q = Doctrine_Query::create()
        ->from('Features a');
        }
        
        
        return $q;
    }

}