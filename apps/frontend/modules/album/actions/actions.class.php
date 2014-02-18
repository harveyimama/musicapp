<?php

/**
 * album actions.
 *
 * @package    musicapp
 * @subpackage album
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class albumActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  
      $this->pager = new sfDoctrinePager('Album',6);
      
      if(!$request->getParameter('search'))
      {
          if($request->getParameter('sort'))
          {
        $this->pager->getQuery()->from('Album a')
                ->addOrderBY($request->getParameter('sort').' '. $request->getParameter('sort_type'));
        
          }
          else
          {
             if(!$request->getParameter('id'))
          {$this->pager->getQuery()->from('Album a');}
          else
          {$this->pager->getQuery()->from('Album a')
                ->where('id = ?', $request->getParameter('id'));
          }
              
              
              }
        
      }
      else
      {
      $this->search = $request->getParameter('search');
      $this->pager->getQuery()->from('Album a')
       ->Where('a.album_nm LIKE ?', '%'.$this->search.'%')
       ->orWhere('Song.song_nm LIKE ?', '%'.$this->search.'%')
       ->andWhere('Song.album_id = a.id');
      
      
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
  
  
  
  public function executeIndexdel(sfWebRequest $request)
  {
         $this->albums = Doctrine_Core::getTable('Album')
      ->createQuery('a')
      ->Where('artist_id = ?', $request->getParameter('artist_id'))
      ->execute();

  }
  
  
  
    public function executeNewbyid(sfWebRequest $request)
  {
          
      $album = new Album();
      $album->setArtistId($request->getParameter('artist_id'));
      $this->form = new AlbumForm($album);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->album);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlbumForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlbumForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  
    public function executeCreate2(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlbumForm();

    $this->processForm2($request, $this->form);

    $this->setTemplate('newbyid');
  }
  


  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);
  }
  
    public function executeEdit2(sfWebRequest $request)
  {
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
    public function executeUpdate2(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);

    $this->processForm2($request, $this->form);

    $this->setTemplate('edit2');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $album->delete();

    $this->redirect('album/index');
  }
  
  
   public function executeDeleteartist(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $album->delete();

    $this->redirect('album/indexdel?artist_id='.$album->getArtistId());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $album = $form->save();

      $this->redirect('album/edit?id='.$album->getId());
    }
  }
  
  
    protected function processForm2(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $album = $form->save();

      $this->redirect('album/edit2?id='.$album->getId());
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
