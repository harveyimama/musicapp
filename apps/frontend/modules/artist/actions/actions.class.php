<?php

/**
 * artist actions.
 *
 * @package    musicapp
 * @subpackage artist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class artistActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $this->pager = new sfDoctrinePager('Artist',6);
      
      if(!$request->getParameter('search'))
      {
          if($request->getParameter('sort'))
          {
        $this->pager->getQuery()->from('Artist a')
                ->addOrderBY($request->getParameter('sort').' '. $request->getParameter('sort_type'));
        
          }
          else
          {
             if(!$request->getParameter('id'))
          {$this->pager->getQuery()->from('Artist a');}
          else
          {$this->pager->getQuery()->from('Artist a')
                ->where('id = ?', $request->getParameter('id'));
          }
              
              
              }
        
      }
      else
      {
      $this->search = $request->getParameter('search');
      $this->pager->getQuery()->from('Artist a')
       ->Where('a.artist_nm LIKE ?', '%'.$this->search.'%')
      ->orWhere('a.real_nm LIKE ?', '%'.$this->search.'%')
      ->orWhere('Album.album_nm LIKE ?', '%'.$this->search.'%')
       ->andWhere('Album.artist_id = a.id');
      
      
      }
 
     
   
   if ($request->getParameter('sort'))
  {
     $this->setSort(array(
         'sort'  =>  $request->getParameter('sort'),
         'sort_type'  =>  $request->getParameter('sort_type')
     ));
  }
 
     $this->getSortType();
     $this->pager->setPage($this->getRequestParameter('page',1));
     $this->pager->init();
     
  }
  
  
 
  public function executeShow(sfWebRequest $request)
  {
    $this->artist = Doctrine_Core::getTable('Artist')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->artist);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArtistForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ArtistForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($artist = Doctrine_Core::getTable('Artist')->find(array($request->getParameter('id'))), sprintf('Object artist does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArtistForm($artist);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($artist = Doctrine_Core::getTable('Artist')->find(array($request->getParameter('id'))), sprintf('Object artist does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArtistForm($artist);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($artist = Doctrine_Core::getTable('Artist')->find(array($request->getParameter('id'))), sprintf('Object artist does not exist (%s).', $request->getParameter('id')));
    $artist->delete();

    $this->redirect('artist/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $artist = $form->save();

      $this->redirect('artist/edit?id='.$artist->getId());
    }
  }
  
  
  public function getSort()
{
   return $this->getUser()->getAttribute('sort', null, $this->getModuleName());
}

public function setSort($sort)
{
   $this->getUser()->setAttribute('sort', $sort, $this->getModuleName());
}

public function getSortType()
{
   $sort = $this->getSort();
    if($sort['sort_type'] == 'asc')
   {
       $this->sortType= 'desc';
   }   
  else
   {
       $this->sortType =  'asc';
   }
}
  
  
}
