<?php

/**
 * song actions.
 *
 * @package    musicapp
 * @subpackage song
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class songActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
     
      $this->pager = new sfDoctrinePager('Song',6);
      
      if(!$request->getParameter('search'))
      {
          if($request->getParameter('sort'))
          {
        $this->pager->getQuery()->from('Song a')
             ->addOrderBY($request->getParameter('sort').' '. $request->getParameter('sort_type'));
        
          }
          else
          {
           if(!$request->getParameter('id'))
          {$this->pager->getQuery()->from('Song a');}
          else
          {$this->pager->getQuery()->from('Song a')
                ->where('album_id = ?', $request->getParameter('id'));
          }
        
          
          }
        
      }
      else
      {
      $this->search = $request->getParameter('search');
      $this->pager->getQuery()->from('Song a')
        ->Where('a.song_nm LIKE ?', '%'.$this->search.'%')
        ->orWhere('Album.album_nm LIKE ?', '%'.$this->search.'%')
        ->orWhere('Artist.artist_nm LIKE ?', '%'.$this->search.'%')
        ->orWhere('Artist.real_nm LIKE ?', '%'.$this->search.'%');
          
      
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
    $this->song = Doctrine_Core::getTable('Song')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->song);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SongForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SongForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($song = Doctrine_Core::getTable('Song')->find(array($request->getParameter('id'))), sprintf('Object song does not exist (%s).', $request->getParameter('id')));
    $this->form = new SongForm($song);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($song = Doctrine_Core::getTable('Song')->find(array($request->getParameter('id'))), sprintf('Object song does not exist (%s).', $request->getParameter('id')));
    $this->form = new SongForm($song);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($song = Doctrine_Core::getTable('Song')->find(array($request->getParameter('id'))), sprintf('Object song does not exist (%s).', $request->getParameter('id')));
    $song->delete();

    $this->redirect('song/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $song = $form->save();

      $this->redirect('song/edit?id='.$song->getId());
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
