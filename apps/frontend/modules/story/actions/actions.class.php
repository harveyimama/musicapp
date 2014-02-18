<?php

/**
 * story actions.
 *
 * @package    musicapp
 * @subpackage story
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class storyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        
      $this->pager = new sfDoctrinePager('Story',6);
      
      if(!$request->getParameter('search'))
      {
          if($request->getParameter('sort'))
          {
        $this->pager->getQuery()->from('Story a')
             ->addOrderBY($request->getParameter('sort').' '. $request->getParameter('sort_type'));
        
          }
          else
          {
           if(!$request->getParameter('id'))
          {$this->pager->getQuery()->from('Story a');}
          else
          {$this->pager->getQuery()->from('Story a')
                ->where('artist_id = ?', $request->getParameter('id'));
          }
        
          
          }
        
      }
      else
      {
      $this->search = $request->getParameter('search');
      $this->pager->getQuery()->from('Story a')
        ->Where('a.story LIKE ?', '%'.$this->search.'%')
        ->orWhere('Artist.artist_nm LIKE ?', '%'.$this->search.'%')
               ->andWhere('Artist.id = a.artist_id')
        ;
          
      
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
    $this->story = Doctrine_Core::getTable('Story')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->story);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StoryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StoryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($story = Doctrine_Core::getTable('Story')->find(array($request->getParameter('id'))), sprintf('Object story does not exist (%s).', $request->getParameter('id')));
    $this->form = new StoryForm($story);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($story = Doctrine_Core::getTable('Story')->find(array($request->getParameter('id'))), sprintf('Object story does not exist (%s).', $request->getParameter('id')));
    $this->form = new StoryForm($story);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($story = Doctrine_Core::getTable('Story')->find(array($request->getParameter('id'))), sprintf('Object story does not exist (%s).', $request->getParameter('id')));
    $story->delete();

    $this->redirect('story/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $story = $form->save();

      $this->redirect('story/edit?id='.$story->getId());
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
